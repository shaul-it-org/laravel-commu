# Sentry Integration

> 애플리케이션 에러 모니터링을 위한 Sentry 연동

## 개요

- **생성일**: 2025-01-16
- **상태**: 계획중
- **담당**: PM Lead
- **Sentry**: Self-hosted

## 협의 내용

### 목적
- 애플리케이션 에러를 실시간으로 추적하고 모니터링
- 에러 발생 시 빠른 대응 체계 구축
- 에러 트렌드 분석 및 품질 개선

### 범위
- Backend: Laravel Sentry SDK 연동
- Frontend: JavaScript Sentry SDK 연동
- DevOps: 프로젝트 설정 및 알림 구성

### 기술적 고려사항
- Self-hosted Sentry 사용
- 환경별 DSN 분리 (local, staging, production)
- 민감 정보 필터링 (비밀번호, 토큰 등)
- Source Map 업로드 (Frontend 디버깅)

### 팀간 의존성
```
DevOps (프로젝트 생성, DSN 발급)
    ↓
Backend (Laravel SDK 연동) + Frontend (JS SDK 연동)
    ↓
QA (에러 발생 테스트, 알림 검증)
```

## 팀별 Tasks

| 팀 | 문서 | 상태 |
|----|------|------|
| PM | [pm-tasks.md](./pm-tasks.md) | 대기 |
| Design | [design-tasks.md](./design-tasks.md) | 해당없음 |
| Frontend | [frontend-tasks.md](./frontend-tasks.md) | 대기 |
| Backend | [backend-tasks.md](./backend-tasks.md) | 대기 |
| DevOps | [devops-tasks.md](./devops-tasks.md) | 대기 |
| QA | [qa-tasks.md](./qa-tasks.md) | 대기 |

## 환경 변수

```env
# Backend (.env)
SENTRY_LARAVEL_DSN=https://{key}@{sentry-host}/{project-id}
SENTRY_TRACES_SAMPLE_RATE=1.0
SENTRY_ENVIRONMENT=local

# Frontend (.env)
VITE_SENTRY_DSN=https://{key}@{sentry-host}/{project-id}
VITE_SENTRY_ENVIRONMENT=local
```

## 진행 이력

| 날짜 | 내용 | 작성자 |
|------|------|--------|
| 2025-01-16 | 기능 생성, 팀별 Tasks 정의 | Claude |
