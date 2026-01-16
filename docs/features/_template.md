# {FEATURE_NAME} 폴더 구조

기능별로 폴더를 생성하고 다음 파일들을 포함합니다.

```
docs/features/{feature-name}/
├── README.md           # 기능 개요, 협의 내용
├── pm-tasks.md         # PM 팀 Tasks
├── design-tasks.md     # Design 팀 Tasks
├── frontend-tasks.md   # Frontend 팀 Tasks
├── backend-tasks.md    # Backend 팀 Tasks
├── devops-tasks.md     # DevOps 팀 Tasks
└── qa-tasks.md         # QA 팀 Tasks
```

## README.md 템플릿

```markdown
# {FEATURE_NAME}

> {FEATURE_DESCRIPTION}

## 개요

- **생성일**: {DATE}
- **상태**: 계획중
- **담당**: PM Lead

## 협의 내용

### 목적
-

### 범위
-

### 기술적 고려사항
-

### 팀간 의존성
-

## 팀별 Tasks

| 팀 | 문서 | 상태 |
|----|------|------|
| PM | [pm-tasks.md](./pm-tasks.md) | 대기 |
| Design | [design-tasks.md](./design-tasks.md) | 대기 |
| Frontend | [frontend-tasks.md](./frontend-tasks.md) | 대기 |
| Backend | [backend-tasks.md](./backend-tasks.md) | 대기 |
| DevOps | [devops-tasks.md](./devops-tasks.md) | 대기 |
| QA | [qa-tasks.md](./qa-tasks.md) | 대기 |

## 진행 이력

| 날짜 | 내용 | 작성자 |
|------|------|--------|
| {DATE} | 기능 생성 | |
```

## 팀별 Tasks 템플릿

```markdown
# {TEAM} Tasks - {FEATURE_NAME}

[← 기능 개요로 돌아가기](./README.md)

## 개요
- **기능**: {FEATURE_NAME}
- **팀**: {TEAM}
- **상태**: 대기

## Tasks

| # | Task | 담당자 | 상태 | 비고 |
|---|------|--------|------|------|
| 1 | Task 1 | | 대기 | |
| 2 | Task 2 | | 대기 | |

## 상세 내용

### 1. Task 1
- [ ] 세부 항목 1
- [ ] 세부 항목 2
```
