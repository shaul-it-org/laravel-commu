<?php

declare(strict_types=1);

use App\Infrastructure\Persistence\Eloquent\UserModel;
use Illuminate\Support\Facades\Artisan;
use Laravel\Passport\Token;

beforeEach(function () {
    // Passport 키 생성
    if (! file_exists(storage_path('oauth-private.key'))) {
        Artisan::call('passport:keys', ['--force' => true]);
    }

    // Personal Access Client 생성
    Artisan::call('passport:client', [
        '--personal' => true,
        '--name' => 'Test Personal Access Client',
    ]);
});

/**
 * Helper function to extract token ID from JWT
 */
function extractTokenIdFromJwt(string $jwt): ?string
{
    try {
        $parts = explode('.', $jwt);
        if (count($parts) !== 3) {
            return null;
        }

        $base64 = strtr($parts[1], '-_', '+/');
        $padding = strlen($base64) % 4;
        if ($padding > 0) {
            $base64 .= str_repeat('=', 4 - $padding);
        }

        $payload = json_decode(base64_decode($base64), true);

        return $payload['jti'] ?? null;
    } catch (\Exception $e) {
        return null;
    }
}

describe('Token Auto Refresh Flow', function () {
    it('access_token이 만료되어도 유효한 refresh_token으로 새 토큰을 발급받을 수 있다', function () {
        /** @var UserModel $user */
        $user = UserModel::factory()->create();

        // 1. 먼저 토큰 발급 (access_token + refresh_token 쿠키)
        $tokenResponse = $this->actingAs($user, 'api')->postJson('/api/auth/token');
        $tokenResponse->assertStatus(200);

        $accessToken = $tokenResponse->json('access_token');
        $refreshTokenCookie = collect($tokenResponse->headers->getCookies())
            ->first(fn ($c) => $c->getName() === 'refresh_token');

        expect($accessToken)->not->toBeNull();
        expect($refreshTokenCookie)->not->toBeNull();

        // 2. access_token 취소 (만료 시뮬레이션)
        $tokenId = extractTokenIdFromJwt($accessToken);
        $token = Token::find($tokenId);
        $token->revoke();

        // 3. 취소된 access_token으로 API 호출 - 401 반환
        // actingAs 상태를 초기화하여 순수하게 토큰으로만 인증
        app('auth')->forgetGuards();

        $response = $this->withHeaders([
            'Authorization' => 'Bearer '.$accessToken,
            'Accept' => 'application/json',
        ])->getJson('/api/auth/me');
        $response->assertStatus(401);

        // 4. refresh_token으로 새 access_token 발급
        $refreshResponse = $this->call(
            method: 'POST',
            uri: '/api/auth/refresh',
            parameters: [],
            cookies: ['refresh_token' => $refreshTokenCookie->getValue()],
            server: ['CONTENT_TYPE' => 'application/json', 'HTTP_ACCEPT' => 'application/json']
        );

        $refreshResponse->assertStatus(200);
        $newAccessToken = $refreshResponse->json('access_token');
        expect($newAccessToken)->not->toBeNull();
        expect($newAccessToken)->not->toBe($accessToken);

        // 5. 새 access_token으로 API 호출 - 성공
        $meResponse = $this->withHeaders([
            'Authorization' => 'Bearer '.$newAccessToken,
        ])->getJson('/api/auth/me');

        $meResponse->assertStatus(200);
        $meResponse->assertJsonPath('data.id', $user->uuid);
    });

    it('만료된 refresh_token으로는 갱신할 수 없다', function () {
        /** @var UserModel $user */
        $user = UserModel::factory()->create();

        // 1. 토큰 발급
        $tokenResponse = $this->actingAs($user, 'api')->postJson('/api/auth/token');
        $refreshTokenCookie = collect($tokenResponse->headers->getCookies())
            ->first(fn ($c) => $c->getName() === 'refresh_token');

        // 2. refresh_token 취소 (만료 시뮬레이션)
        $refreshTokenId = extractTokenIdFromJwt($refreshTokenCookie->getValue());
        $refreshToken = Token::find($refreshTokenId);
        $refreshToken->revoke();

        // 3. 취소된 refresh_token으로 갱신 시도 - 401 반환
        $refreshResponse = $this->call(
            method: 'POST',
            uri: '/api/auth/refresh',
            parameters: [],
            cookies: ['refresh_token' => $refreshTokenCookie->getValue()],
            server: ['CONTENT_TYPE' => 'application/json', 'HTTP_ACCEPT' => 'application/json']
        );

        $refreshResponse->assertStatus(401);
        $refreshResponse->assertJson(['message' => 'Refresh token has been revoked']);
    });

    it('refresh 요청 시 refresh_token 쿠키가 없으면 명확한 에러 메시지를 반환한다', function () {
        $response = $this->postJson('/api/auth/refresh');

        $response->assertStatus(401);
        $response->assertJson(['message' => 'Refresh token is missing']);
    });

    it('잘못된 형식의 refresh_token으로 요청 시 명확한 에러를 반환한다', function () {
        $response = $this->call(
            method: 'POST',
            uri: '/api/auth/refresh',
            parameters: [],
            cookies: ['refresh_token' => 'not-a-valid-jwt-token'],
            server: ['CONTENT_TYPE' => 'application/json', 'HTTP_ACCEPT' => 'application/json']
        );

        $response->assertStatus(401);
        $response->assertJson(['message' => 'Invalid refresh token']);
    });

    it('존재하지 않는 토큰 ID로 refresh 요청 시 명확한 에러를 반환한다', function () {
        // 유효한 JWT 형식이지만 존재하지 않는 토큰 ID
        // JWT 구조: header.payload.signature
        $fakeTokenId = 'nonexistent-token-id-12345678901234567890';
        $payload = base64_encode(json_encode(['jti' => $fakeTokenId, 'aud' => '1', 'sub' => '1']));
        $fakeJwt = 'eyJhbGciOiJSUzI1NiIsInR5cCI6IkpXVCJ9.'.$payload.'.fake-signature';

        $response = $this->call(
            method: 'POST',
            uri: '/api/auth/refresh',
            parameters: [],
            cookies: ['refresh_token' => $fakeJwt],
            server: ['CONTENT_TYPE' => 'application/json', 'HTTP_ACCEPT' => 'application/json']
        );

        $response->assertStatus(401);
        $response->assertJson(['message' => 'Invalid refresh token']);
    });

    it('access_token을 refresh_token 대신 사용하면 거부된다', function () {
        /** @var UserModel $user */
        $user = UserModel::factory()->create();

        // access_token 발급
        $tokenResponse = $this->actingAs($user, 'api')->postJson('/api/auth/token');
        $accessToken = $tokenResponse->json('access_token');

        // access_token을 refresh 쿠키로 사용 시도
        $refreshResponse = $this->call(
            method: 'POST',
            uri: '/api/auth/refresh',
            parameters: [],
            cookies: ['refresh_token' => $accessToken],
            server: ['CONTENT_TYPE' => 'application/json', 'HTTP_ACCEPT' => 'application/json']
        );

        $refreshResponse->assertStatus(401);
        $refreshResponse->assertJson(['message' => 'Invalid refresh token']);
    });
});
