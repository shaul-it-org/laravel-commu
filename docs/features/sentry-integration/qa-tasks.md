# QA Tasks - Sentry Integration

[← 기능 개요로 돌아가기](./README.md)

## 개요
- **기능**: Sentry Integration
- **팀**: QA
- **상태**: 대기
- **의존성**: Backend/Frontend 연동 완료 필요

## Tasks

| # | Task | 담당자 | 상태 | 비고 |
|---|------|--------|------|------|
| 1 | 에러 발생 시나리오 정의 | | 대기 | |
| 2 | Frontend 에러 캡처 검증 | | 대기 | Playwright |
| 3 | Backend 에러 캡처 검증 | | 대기 | API 테스트 |
| 4 | Sentry 대시보드 에러 확인 | | 대기 | |
| 5 | 알림 수신 테스트 | | 대기 | Slack/Email |

## 상세 내용

### 1. 에러 발생 시나리오 정의

| 시나리오 | 유형 | 예상 결과 |
|----------|------|-----------|
| JS 런타임 에러 | Frontend | Sentry에 캡처 |
| API 500 에러 | Backend | Sentry에 캡처 |
| 404 에러 | Backend | 캡처 제외 (설정에 따라) |
| 인증 실패 | Backend | 캡처 제외 |

### 2. Frontend 에러 캡처 검증 (Playwright)
```javascript
// Playwright 테스트 예시
test('Frontend 에러가 Sentry에 캡처되는지 확인', async ({ page }) => {
  // 의도적 에러 발생 페이지 접근
  await page.goto('/test-error');

  // Sentry 대시보드에서 에러 확인 (수동)
});
```

### 3. Backend 에러 캡처 검증
```bash
# 테스트 에러 발생
php artisan sentry:test

# 또는 API 호출로 에러 발생
curl -X GET http://localhost/api/test-error
```

### 4. Sentry 대시보드 에러 확인
- [ ] Self-hosted Sentry 접속
- [ ] 프로젝트 선택
- [ ] Issues 탭에서 에러 확인
- [ ] 에러 상세 정보 확인 (스택트레이스, 컨텍스트)

### 5. 알림 수신 테스트
- [ ] 에러 발생 시 Slack 알림 수신 확인
- [ ] 에러 발생 시 Email 알림 수신 확인
- [ ] 알림 내용 적절성 확인
