# MCP Integration Guide

> Claude Code에서 Slack, Sentry, Atlassian을 활용하는 방법

## 개요

| MCP | 용도 | 주요 기능 |
|-----|------|----------|
| **Slack** | 커뮤니케이션 | 메시지 전송, 채널 관리, 알림 |
| **Sentry** | 에러 모니터링 | 이슈 조회, 에러 분석, 성능 추적 |
| **Atlassian** | 프로젝트 관리 | Jira 이슈, Confluence 문서 |

---

## 팀별 활용 계획

### PM Team

| MCP | 활용 방법 |
|-----|----------|
| **Slack** | 팀 공지, 일정 알림, 회의 요청 |
| **Jira** | 스프린트 계획, 이슈 생성/할당, 진행 현황 확인 |
| **Confluence** | 요구사항 문서, 회의록, 기능 명세서 작성 |

**예시 워크플로우:**
```
1. Jira에서 Epic/Story 생성
2. 팀별 Task 할당
3. Confluence에 상세 요구사항 문서화
4. Slack으로 팀에 공유
```

---

### Design Team

| MCP | 활용 방법 |
|-----|----------|
| **Slack** | 디자인 리뷰 요청, 피드백 공유 |
| **Jira** | 디자인 Task 관리, 진행 상태 업데이트 |
| **Confluence** | 디자인 가이드라인, 컴포넌트 문서 |

**예시 워크플로우:**
```
1. Jira에서 디자인 Task 확인
2. Wireframe/Mockup 작성
3. Confluence에 디자인 시스템 문서화
4. Slack으로 리뷰 요청
```

---

### Frontend Team

| MCP | 활용 방법 |
|-----|----------|
| **Slack** | 코드 리뷰 요청, 배포 알림 |
| **Sentry** | JS 에러 조회, 성능 이슈 분석 |
| **Jira** | 개발 Task 관리, 버그 트래킹 |
| **Confluence** | 컴포넌트 문서, API 연동 가이드 |

**예시 워크플로우:**
```
1. Jira에서 Task 확인
2. 개발 완료 후 Sentry로 에러 모니터링
3. 문제 발생 시 Jira 버그 이슈 생성
4. Slack으로 팀에 알림
```

---

### Backend Team

| MCP | 활용 방법 |
|-----|----------|
| **Slack** | 배포 알림, 장애 알림 |
| **Sentry** | Exception 조회, API 성능 분석, 프로파일링 |
| **Jira** | 개발 Task, 버그 트래킹 |
| **Confluence** | API 문서, 아키텍처 문서 |

**예시 워크플로우:**
```
1. Sentry에서 에러 발생 감지
2. 에러 분석 및 원인 파악
3. Jira에 버그 이슈 생성
4. 수정 후 Slack으로 완료 알림
```

---

### DevOps Team

| MCP | 활용 방법 |
|-----|----------|
| **Slack** | 배포 상태, 인프라 알림, 장애 알림 |
| **Sentry** | 전체 시스템 에러 모니터링, Release 관리 |
| **Jira** | 인프라 Task, 배포 일정 관리 |
| **Confluence** | 인프라 구성도, 배포 가이드 |

**예시 워크플로우:**
```
1. 배포 시작 → Slack 알림
2. Sentry Release 생성
3. 배포 완료 → Slack 알림
4. 에러 급증 시 → Slack 장애 알림
```

---

### QA Team

| MCP | 활용 방법 |
|-----|----------|
| **Slack** | 테스트 완료 알림, 버그 리포트 |
| **Sentry** | 에러 재현, 사용자 세션 분석 |
| **Jira** | 테스트 케이스, 버그 이슈 관리 |
| **Confluence** | 테스트 계획서, QA 체크리스트 |

**예시 워크플로우:**
```
1. Jira에서 테스트 Task 확인
2. Sentry로 에러 현황 확인
3. 버그 발견 시 Jira 이슈 생성
4. Slack으로 개발팀에 알림
```

---

## MCP 명령어 예시

### Slack
```
- 채널에 메시지 전송
- 특정 사용자에게 DM
- 채널 목록 조회
```

### Sentry
```
- 프로젝트 이슈 목록 조회
- 특정 이슈 상세 정보
- 에러 통계 조회
```

### Atlassian (Jira)
```
- 이슈 생성/수정/조회
- 스프린트 정보 조회
- 담당자 할당
```

### Atlassian (Confluence)
```
- 페이지 생성/수정/조회
- 문서 검색
- 스페이스 관리
```

---

## 설정 정보

| 서비스 | URL |
|--------|-----|
| Slack | 워크스페이스 연결됨 |
| Sentry | https://sentry.shaul.link |
| Jira | https://laravel-commu.atlassian.net |
| Confluence | https://laravel-commu.atlassian.net/wiki |
