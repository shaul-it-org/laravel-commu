# Frontend Tasks - Sentry Integration

[← 기능 개요로 돌아가기](./README.md)

## 개요
- **기능**: Sentry Integration
- **팀**: Frontend
- **상태**: 대기
- **의존성**: DevOps (DSN 발급 필요)

## Tasks

| # | Task | 담당자 | 상태 | 비고 |
|---|------|--------|------|------|
| 1 | @sentry/browser 패키지 설치 | | 대기 | npm install |
| 2 | Sentry.init() 설정 | | 대기 | resources/js/app.js |
| 3 | 환경별 DSN 설정 | | 대기 | .env |
| 4 | Source Map 업로드 설정 | | 대기 | vite.config.js |
| 5 | 에러 바운더리 테스트 | | 대기 | |

## 상세 내용

### 1. @sentry/browser 패키지 설치
```bash
npm install @sentry/browser
```

### 2. Sentry.init() 설정
```javascript
// resources/js/app.js
import * as Sentry from '@sentry/browser';

Sentry.init({
  dsn: import.meta.env.VITE_SENTRY_DSN,
  environment: import.meta.env.VITE_SENTRY_ENVIRONMENT,
  tracesSampleRate: 1.0,
});
```

### 3. 환경별 DSN 설정
```env
# .env
VITE_SENTRY_DSN=https://{key}@{sentry-host}/{project-id}
VITE_SENTRY_ENVIRONMENT=local
```

### 4. Source Map 업로드 설정
```javascript
// vite.config.js
import { sentryVitePlugin } from '@sentry/vite-plugin';

export default defineConfig({
  plugins: [
    sentryVitePlugin({
      org: 'your-org',
      project: 'laravel-commu-frontend',
    }),
  ],
});
```

### 5. 에러 바운더리 테스트
- [ ] 의도적 에러 발생 테스트
- [ ] Sentry 대시보드에서 에러 확인
