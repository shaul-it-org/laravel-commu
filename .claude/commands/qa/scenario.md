# /qa:scenario

사용자 시나리오를 작성하고 Playwright로 브라우저에서 테스트한다.

## Arguments
- feature: 기능명
- url: 테스트할 URL (선택)

## Instructions
1. 사용자 페르소나를 정의한다
2. 주요 사용자 플로우를 작성한다
3. 대안 경로를 식별한다
4. 예외 상황을 정의한다
5. Playwright MCP 도구로 실제 브라우저에서 테스트한다:
   - browser_navigate: 페이지 이동
   - browser_snapshot: 페이지 상태 확인
   - browser_click: 요소 클릭
   - browser_type: 텍스트 입력
   - browser_take_screenshot: 스크린샷 캡처
6. 테스트 결과를 문서화한다
