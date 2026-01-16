# Backend Tasks - Sentry Integration

[← 기능 개요로 돌아가기](./README.md)

## 개요
- **기능**: Sentry Integration
- **팀**: Backend
- **상태**: 완료
- **의존성**: DevOps (DSN 발급 필요)

## Tasks

| # | Task | 담당자 | 상태 | 비고 |
|---|------|--------|------|------|
| 1 | sentry/sentry-laravel 패키지 설치 | | 완료 | v4.20.1 |
| 2 | config/sentry.php 설정 | | 완료 | |
| 3 | 환경별 DSN 설정 | | 완료 | .env |
| 4 | Exception Handler 연동 | | 완료 | bootstrap/app.php |
| 5 | 민감 정보 필터링 설정 | | 완료 | before_send |
| 6 | 커스텀 컨텍스트 추가 | | 완료 | AppServiceProvider |
| 7 | 테스트 에러 발생 | | 완료 | php artisan sentry:test |

## 상세 내용

### 1. sentry/sentry-laravel 패키지 설치 ✅
```bash
composer require sentry/sentry-laravel
```

### 2. config/sentry.php 설정 ✅
```bash
php artisan sentry:publish --dsn=https://{key}@{sentry-host}/{project-id}
```

### 3. 환경별 DSN 설정 ✅
```env
# .env
SENTRY_LARAVEL_DSN=https://{key}@{sentry-host}/{project-id}
SENTRY_SEND_DEFAULT_PII=true
SENTRY_TRACES_SAMPLE_RATE=1.0
```

### 4. Exception Handler 연동 ✅
```php
// bootstrap/app.php
use Sentry\Laravel\Integration;

->withExceptions(function (Exceptions $exceptions): void {
    Integration::handles($exceptions);
})
```

### 5. 민감 정보 필터링 설정 ✅
```php
// config/sentry.php
'before_send' => function (\Sentry\Event $event): ?\Sentry\Event {
    $request = $event->getRequest();
    if ($request !== null) {
        $sensitiveKeys = ['password', 'password_confirmation', 'token', 'secret', 'credit_card'];
        $data = $request['data'] ?? [];
        foreach ($sensitiveKeys as $key) {
            if (isset($data[$key])) {
                $data[$key] = '[FILTERED]';
            }
        }
        $request['data'] = $data;
        $event->setRequest($request);
    }
    return $event;
},
```

**필터링 대상:**
- password, password_confirmation
- token, secret
- credit_card

### 6. 커스텀 컨텍스트 추가 ✅
```php
// app/Providers/AppServiceProvider.php
private function configureSentryUserContext(): void
{
    if (! app()->bound('sentry')) {
        return;
    }

    $this->app->booted(function () {
        \Sentry\configureScope(function (\Sentry\State\Scope $scope): void {
            if (Auth::check()) {
                $user = Auth::user();
                $scope->setUser([
                    'id' => $user->id,
                    'email' => $user->email,
                    'username' => $user->name ?? null,
                ]);
            }
        });
    });
}
```

### 7. 테스트 에러 발생 ✅
```bash
php artisan sentry:test
# Test event sent with ID: 2d2f05f6067443a9b0d4c3ec4b8542c8
```
