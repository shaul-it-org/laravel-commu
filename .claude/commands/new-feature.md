# /new-feature

새로운 기능을 기획하고 모든 팀 리더가 협의하여 작업을 정의한다.

## Arguments
- name: 기능명 (영문, kebab-case)
- description: 기능 설명

## Instructions

### 1. 기능 분석 및 협의
모든 팀 리더(PM, Design, Frontend, Backend, DevOps, QA)가 모여 다음을 협의한다:
- 기능의 목적과 범위
- 사용자 요구사항
- 기술적 제약사항
- 팀간 의존성

### 2. 각 팀별 Tasks 정의
각 팀 리더는 자신의 팀에서 수행해야 할 작업을 정의한다:

**PM 팀:**
- 요구사항 정리
- 일정 및 우선순위
- 이해관계자 커뮤니케이션

**Design 팀:**
- UX 플로우 설계
- UI 목업/와이어프레임
- 디자인 시스템 적용

**Frontend 팀:**
- 컴포넌트 개발
- 페이지 구현
- API 연동

**Backend 팀:**
- API 설계 및 개발
- 데이터베이스 설계
- 비즈니스 로직 구현

**DevOps 팀:**
- 인프라 준비
- 배포 파이프라인
- 모니터링 설정

**QA 팀:**
- 사용자 시나리오 검토
- QA 체크리스트 작성
- 테스트 케이스 정의
- 품질 검증

### 3. 문서화
`docs/features/{name}.md` 파일을 생성하고 다음 내용을 포함한다:
- 기능 개요
- 협의 내용
- 각 팀별 Tasks 목록
- 의존성 및 일정

### 4. 마스터 문서 업데이트
`docs/features/README.md`에 새 기능을 추가한다.

## Output
- `docs/features/{name}.md` - 기능별 상세 문서
- `docs/features/README.md` 업데이트 - 전체 기능 목록
