# /backend:migration

데이터베이스 마이그레이션을 생성한다.

## Arguments
- name: 마이그레이션명 (예: create_users_table)

## Instructions
1. 테이블 구조를 설계한다
2. php artisan make:migration으로 마이그레이션을 생성한다
3. 컬럼, 인덱스, 외래키를 정의한다
4. down() 메서드로 롤백을 구현한다
