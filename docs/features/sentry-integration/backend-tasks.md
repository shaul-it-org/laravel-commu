# Backend Tasks - Sentry Integration

[← 기능 개요로 돌아가기](./README.md)

## 개요
- **기능**: Sentry Integration
- **팀**: Backend
- **상태**: 대기
- **의존성**: DevOps (DSN 발급 필요)

## Tasks

| # | Task | 담당자 | 상태 | 비고 |
|---|------|--------|------|------|
| 1 | sentry/sentry-laravel 패키지 설치 | | 대기 | composer require |
| 2 | config/sentry.php 설정 | | 대기 | php artisan sentry:publish |
| 3 | 환경별 DSN 설정 | | 대기 | .env |
| 4 | 민감 정보 필터링 설정 | | 대기 | scrubData |
| 5 | 커스텀 컨텍스트 추가 | | 대기 | 사용자 정보 등 |
| 6 | 테스트 에러 발생 | | 대기 | php artisan sentry:test |

## 상세 내용

### 1. sentry/sentry-laravel 패키지 설치
```bash
composer require sentry/sentry-laravel
```

### 2. config/sentry.php 설정
```bash
php artisan sentry:publish --dsn=https://{key}@{sentry-host}/{project-id}
```

### 3. 환경별 DSN 설정
```env
# .env
SENTRY_LARAVEL_DSN=https://{key}@{sentry-host}/{project-id}
SENTRY_TRACES_SAMPLE_RATE=1.0
SENTRY_ENVIRONMENT=local
```

### 4. 민감 정보 필터링 설정
```php
// config/sentry.php
'send_default_pii' => false,
'before_send' => function (\Sentry\Event $event): ?\Sentry\Event {
    // 민감 정보 필터링
    return $event;
},
```

### 5. 커스텀 컨텍스트 추가
```php
// app/Providers/AppServiceProvider.php
\Sentry\configureScope(function (\Sentry\State\Scope $scope): void {
    if (auth()->check()) {
        $scope->setUser([
            'id' => auth()->id(),
            'email' => auth()->user()->email,
        ]);
    }
});
```

### 6. 테스트 에러 발생
```bash
php artisan sentry:test
```
