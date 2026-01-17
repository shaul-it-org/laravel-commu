<?php

declare(strict_types=1);

namespace Tests\Feature\AccessControl;

use App\Infrastructure\Persistence\Eloquent\UserModel;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use PHPUnit\Framework\Attributes\Test;
use Tests\TestCase;

/**
 * 클라이언트 측 인증 페이지 접근 테스트
 *
 * 이 프로젝트는 SPA 방식으로 토큰 기반 인증을 사용합니다.
 * 서버는 모든 사용자에게 페이지를 반환하고, 클라이언트에서 인증 상태를 체크합니다.
 * - 인증 필요 페이지는 클라이언트 JavaScript에서 인증 상태를 확인
 * - 미인증 사용자는 클라이언트에서 로그인 페이지로 리디렉션
 */
final class AuthMiddlewareTest extends TestCase
{
    use RefreshDatabase;

    private UserModel $user;

    protected function setUp(): void
    {
        parent::setUp();

        $this->user = UserModel::create([
            'uuid' => '550e8400-e29b-41d4-a716-446655440000',
            'name' => '홍길동',
            'email' => 'hong@example.com',
            'username' => 'honggildong',
            'password' => Hash::make('Password123!'),
        ]);
    }

    #[Test]
    public function write_page_returns_200_for_client_side_auth_check(): void
    {
        // SPA 방식: 서버는 페이지를 반환, 클라이언트에서 인증 체크
        $response = $this->get('/write');

        $response->assertStatus(200);
        $response->assertSee('로그인이 필요합니다'); // 클라이언트에서 미인증 시 보여줄 메시지
    }

    #[Test]
    public function authenticated_user_can_access_write_page(): void
    {
        $response = $this->actingAs($this->user)->get('/write');

        $response->assertStatus(200);
    }

    #[Test]
    public function article_edit_page_returns_200_for_client_side_auth_check(): void
    {
        // SPA 방식: 서버는 페이지를 반환, 클라이언트에서 인증 체크
        $response = $this->get('/articles/test-slug/edit');

        $response->assertStatus(200);
    }

    #[Test]
    public function authenticated_user_can_access_article_edit_page(): void
    {
        $response = $this->actingAs($this->user)->get('/articles/test-slug/edit');

        $response->assertStatus(200);
    }

    #[Test]
    public function settings_page_returns_200_for_client_side_auth_check(): void
    {
        // SPA 방식: 서버는 페이지를 반환, 클라이언트에서 인증 체크
        $response = $this->get('/settings');

        $response->assertStatus(200);
    }

    #[Test]
    public function authenticated_user_can_access_settings_page(): void
    {
        $response = $this->actingAs($this->user)->get('/settings');

        $response->assertStatus(200);
    }

    #[Test]
    public function my_articles_page_returns_200_for_client_side_auth_check(): void
    {
        // SPA 방식: 서버는 페이지를 반환, 클라이언트에서 인증 체크
        $response = $this->get('/me/articles');

        $response->assertStatus(200);
    }

    #[Test]
    public function authenticated_user_can_access_my_articles_page(): void
    {
        $response = $this->actingAs($this->user)->get('/me/articles');

        $response->assertStatus(200);
    }
}
