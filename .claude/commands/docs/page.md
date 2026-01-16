# /docs:page

Confluence 페이지를 생성 또는 업데이트한다.

## Arguments
- space: 스페이스 키 (기본: DOCS)
- title: 페이지 제목
- parent_id: 부모 페이지 ID (선택)

## Instructions

1. 요청된 내용을 분석한다
2. Confluence 페이지 구조를 설계한다
3. Markdown 또는 Storage format으로 콘텐츠를 작성한다
4. confluence_create_page 또는 confluence_update_page를 호출한다

## Content Formats

### Markdown (권장)
```markdown
# 페이지 제목

## 섹션 1
내용...

## 섹션 2
| 열1 | 열2 |
|-----|-----|
| A   | B   |
```

### Storage Format (고급)
Mermaid 다이어그램, 코드 블록 등 매크로 사용 시 필요.

```xml
<h1>제목</h1>
<p>내용</p>
<ac:structured-macro ac:name="code">
  <ac:parameter ac:name="language">php</ac:parameter>
  <ac:plain-text-body><![CDATA[echo "Hello";]]></ac:plain-text-body>
</ac:structured-macro>
```

## Common Macros

### Code Block
```xml
<ac:structured-macro ac:name="code" ac:schema-version="1">
  <ac:parameter ac:name="language">php</ac:parameter>
  <ac:parameter ac:name="breakoutMode">wide</ac:parameter>
  <ac:plain-text-body><![CDATA[코드 내용]]></ac:plain-text-body>
</ac:structured-macro>
```

### Page Link
```xml
<ac:link>
  <ri:page ri:content-title="페이지 제목"></ri:page>
  <ac:link-body>링크 텍스트</ac:link-body>
</ac:link>
```

### Mermaid Diagram
See `/docs:diagram` command.

## MCP Tools
- **Confluence**: confluence_create_page, confluence_update_page, confluence_get_page
- **Jira**: jira_create_remote_issue_link (Jira-Confluence 연결)

## Best Practices
- 페이지 제목은 명확하고 검색 가능하게
- 목차가 자동 생성되도록 헤딩 구조 활용
- 관련 Jira 이슈 링크 포함
- 다이어그램은 `/docs:diagram` 사용
