<?php

namespace Tests\Feature;

use App\Exceptions\Business\DuplicateResourceException;
use App\Exceptions\Business\InvalidOperationException;
use App\Exceptions\Business\ResourceNotFoundException;
use App\Exceptions\Http\BadRequestException;
use App\Exceptions\Http\ForbiddenException;
use App\Exceptions\Http\InternalServerException;
use App\Exceptions\Http\NotFoundException;
use App\Exceptions\Http\UnauthorizedException;
use App\Exceptions\Http\ValidationException;
use Illuminate\Support\Facades\Route;
use Tests\TestCase;

class ExceptionTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->withoutExceptionHandling();
    }

    public function test_bad_request_exception_returns_400_status(): void
    {
        Route::get('/test-bad-request', function () {
            throw new BadRequestException('잘못된 요청입니다.');
        });

        $this->withExceptionHandling();
        $response = $this->getJson('/test-bad-request');

        $response->assertStatus(400)
            ->assertJson([
                'success' => false,
                'error' => [
                    'code' => 'BAD_REQUEST',
                    'message' => '잘못된 요청입니다.',
                ],
            ]);
    }

    public function test_unauthorized_exception_returns_401_status(): void
    {
        Route::get('/test-unauthorized', function () {
            throw new UnauthorizedException('인증이 필요합니다.');
        });

        $this->withExceptionHandling();
        $response = $this->getJson('/test-unauthorized');

        $response->assertStatus(401)
            ->assertJson([
                'success' => false,
                'error' => [
                    'code' => 'UNAUTHORIZED',
                    'message' => '인증이 필요합니다.',
                ],
            ]);
    }

    public function test_forbidden_exception_returns_403_status(): void
    {
        Route::get('/test-forbidden', function () {
            throw new ForbiddenException('접근 권한이 없습니다.');
        });

        $this->withExceptionHandling();
        $response = $this->getJson('/test-forbidden');

        $response->assertStatus(403)
            ->assertJson([
                'success' => false,
                'error' => [
                    'code' => 'FORBIDDEN',
                    'message' => '접근 권한이 없습니다.',
                ],
            ]);
    }

    public function test_not_found_exception_returns_404_status(): void
    {
        Route::get('/test-not-found', function () {
            throw new NotFoundException('리소스를 찾을 수 없습니다.');
        });

        $this->withExceptionHandling();
        $response = $this->getJson('/test-not-found');

        $response->assertStatus(404)
            ->assertJson([
                'success' => false,
                'error' => [
                    'code' => 'NOT_FOUND',
                    'message' => '리소스를 찾을 수 없습니다.',
                ],
            ]);
    }

    public function test_validation_exception_returns_422_status_with_details(): void
    {
        Route::get('/test-validation', function () {
            throw new ValidationException('입력값이 유효하지 않습니다.', [
                'email' => ['이메일 형식이 올바르지 않습니다.'],
                'password' => ['비밀번호는 8자 이상이어야 합니다.'],
            ]);
        });

        $this->withExceptionHandling();
        $response = $this->getJson('/test-validation');

        $response->assertStatus(422)
            ->assertJson([
                'success' => false,
                'error' => [
                    'code' => 'VALIDATION_ERROR',
                    'message' => '입력값이 유효하지 않습니다.',
                    'details' => [
                        'email' => ['이메일 형식이 올바르지 않습니다.'],
                        'password' => ['비밀번호는 8자 이상이어야 합니다.'],
                    ],
                ],
            ]);
    }

    public function test_internal_server_exception_returns_500_status(): void
    {
        Route::get('/test-internal-server', function () {
            throw new InternalServerException('서버 내부 오류가 발생했습니다.');
        });

        $this->withExceptionHandling();
        $response = $this->getJson('/test-internal-server');

        $response->assertStatus(500)
            ->assertJson([
                'success' => false,
                'error' => [
                    'code' => 'INTERNAL_SERVER_ERROR',
                    'message' => '서버 내부 오류가 발생했습니다.',
                ],
            ]);
    }

    public function test_resource_not_found_exception_returns_404_with_custom_code(): void
    {
        Route::get('/test-resource-not-found', function () {
            throw new ResourceNotFoundException('User', 123);
        });

        $this->withExceptionHandling();
        $response = $this->getJson('/test-resource-not-found');

        $response->assertStatus(404)
            ->assertJson([
                'success' => false,
                'error' => [
                    'code' => 'USER_NOT_FOUND',
                    'message' => 'User(123)을(를) 찾을 수 없습니다.',
                ],
            ]);
    }

    public function test_duplicate_resource_exception_returns_409_with_custom_code(): void
    {
        Route::get('/test-duplicate-resource', function () {
            throw new DuplicateResourceException('User', 'email', 'test@example.com');
        });

        $this->withExceptionHandling();
        $response = $this->getJson('/test-duplicate-resource');

        $response->assertStatus(409)
            ->assertJson([
                'success' => false,
                'error' => [
                    'code' => 'USER_DUPLICATE',
                    'message' => 'User의 email(test@example.com)이(가) 이미 존재합니다.',
                ],
            ]);
    }

    public function test_invalid_operation_exception_returns_422_with_custom_code(): void
    {
        Route::get('/test-invalid-operation', function () {
            throw new InvalidOperationException('ORDER_CANCEL', '이미 배송이 시작된 주문은 취소할 수 없습니다.');
        });

        $this->withExceptionHandling();
        $response = $this->getJson('/test-invalid-operation');

        $response->assertStatus(422)
            ->assertJson([
                'success' => false,
                'error' => [
                    'code' => 'ORDER_CANCEL_INVALID',
                    'message' => '이미 배송이 시작된 주문은 취소할 수 없습니다.',
                ],
            ]);
    }

    public function test_exception_includes_context_data(): void
    {
        Route::get('/test-context', function () {
            throw (new BadRequestException('잘못된 요청입니다.'))
                ->withContext(['request_id' => 'abc123', 'user_id' => 1]);
        });

        $this->withExceptionHandling();
        $response = $this->getJson('/test-context');

        $response->assertStatus(400);

        $exception = new BadRequestException('잘못된 요청입니다.');
        $exception->withContext(['request_id' => 'abc123', 'user_id' => 1]);

        $this->assertEquals(['request_id' => 'abc123', 'user_id' => 1], $exception->getContext());
    }

    public function test_exception_toarray_returns_correct_structure(): void
    {
        $exception = new ValidationException('입력값이 유효하지 않습니다.', [
            'email' => ['이메일 형식이 올바르지 않습니다.'],
        ]);

        $array = $exception->toArray();

        $this->assertArrayHasKey('success', $array);
        $this->assertArrayHasKey('error', $array);
        $this->assertArrayHasKey('code', $array['error']);
        $this->assertArrayHasKey('message', $array['error']);
        $this->assertArrayHasKey('details', $array['error']);
        $this->assertFalse($array['success']);
    }
}
