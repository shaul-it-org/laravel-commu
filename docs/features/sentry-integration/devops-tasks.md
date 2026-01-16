# DevOps Tasks - Sentry Integration

[← 기능 개요로 돌아가기](./README.md)

## 개요
- **기능**: Sentry Integration
- **팀**: DevOps
- **상태**: 대기
- **Sentry**: Self-hosted

## Tasks

| # | Task | 담당자 | 상태 | 비고 |
|---|------|--------|------|------|
| 1 | Sentry 프로젝트 생성 | | 대기 | laravel-commu |
| 2 | DSN 발급 | | 대기 | Backend/Frontend 별도 |
| 3 | 알림 채널 설정 | | 대기 | Slack/Email |
| 4 | 알림 규칙 설정 | | 대기 | 에러 발생 시 |
| 5 | 환경별 설정 분리 | | 대기 | local/staging/prod |

## 상세 내용

### 1. Sentry 프로젝트 생성
- [ ] Self-hosted Sentry 접속
- [ ] 새 프로젝트 생성: `laravel-commu-backend` (Laravel)
- [ ] 새 프로젝트 생성: `laravel-commu-frontend` (JavaScript)

### 2. DSN 발급
- [ ] Backend DSN 발급 및 공유
- [ ] Frontend DSN 발급 및 공유

### 3. 알림 채널 설정
- [ ] Slack Webhook 연동 (선택)
- [ ] Email 알림 설정

### 4. 알림 규칙 설정
- [ ] 새 에러 발생 시 알림
- [ ] 에러 급증 시 알림 (threshold 설정)
- [ ] Critical 에러 즉시 알림

### 5. 환경별 설정 분리
| 환경 | 설정 |
|------|------|
| local | 알림 비활성화, 샘플링 100% |
| staging | 알림 활성화, 샘플링 100% |
| production | 알림 활성화, 샘플링 조정 |
