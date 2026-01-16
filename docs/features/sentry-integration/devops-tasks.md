# DevOps Tasks - Sentry Integration

[← 기능 개요로 돌아가기](./README.md)

## 개요
- **기능**: Sentry Integration
- **팀**: DevOps
- **상태**: 진행중
- **Sentry**: Self-hosted
- **Organization**: home-shaul
- **Project ID**: 4

## Tasks

| # | Task | 담당자 | 상태 | 비고 |
|---|------|--------|------|------|
| 1 | Sentry 프로젝트 생성 | | 완료 | project=4 |
| 2 | DSN 발급 (Backend) | | 완료 | .env 설정됨 |
| 3 | DSN 발급 (Frontend) | | 대기 | |
| 4 | 알림 채널 설정 | | 대기 | Slack/Email |
| 5 | 알림 규칙 설정 | | 대기 | 에러 발생 시 |
| 6 | 환경별 설정 분리 | | 대기 | local/staging/prod |

## 상세 내용

### 1. Sentry 프로젝트 생성 ✅
- [x] Self-hosted Sentry 접속
- [x] 프로젝트 생성 (Project ID: 4)
- [ ] Frontend 프로젝트 생성 (필요시)

### 2. DSN 발급 (Backend) ✅
- [x] Backend DSN 발급 및 공유

### 3. DSN 발급 (Frontend)
- [ ] Frontend DSN 발급 및 공유

### 4. 알림 채널 설정
- [ ] Slack Webhook 연동 (선택)
- [ ] Email 알림 설정

### 5. 알림 규칙 설정
- [ ] 새 에러 발생 시 알림
- [ ] 에러 급증 시 알림 (threshold 설정)
- [ ] Critical 에러 즉시 알림

### 6. 환경별 설정 분리
| 환경 | 설정 |
|------|------|
| local | 알림 비활성화, 샘플링 100% |
| staging | 알림 활성화, 샘플링 100% |
| production | 알림 활성화, 샘플링 조정 |
