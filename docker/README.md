# Docker 로컬 개발 인프라

## 서비스 구성

| 서비스        | 포트  | 용도                   |
|---------------|-------|------------------------|
| Nginx         | 80    | 웹서버 (리버스 프록시) |
| WAS           | 9002  | PHP-FPM + Supervisor   |
| PostgreSQL    | 5432  | 메인 데이터베이스      |
| Redis         | 6379  | 캐시/세션/큐           |
| MongoDB       | 27017 | 도큐먼트 DB            |
| MinIO API     | 9000  | S3 호환 스토리지       |
| MinIO Console | 9001  | MinIO 관리 UI          |

## 웹서버 구성

```
[Client] → [Nginx:80] → [WAS:9000 (PHP-FPM)]
```

## WAS 구성

- **PHP 8.4-FPM** (Alpine 기반)
- **Supervisor**: PHP-FPM, Queue Worker, Scheduler 관리
- **PHP 확장**: pdo_pgsql, pcntl, opcache, redis

## 사용법

```bash
# 설정 파일 생성 (최초 1회)
cp .env.example .env

# 컨테이너 시작
docker compose up -d

# 컨테이너 중지
docker compose down

# 로그 확인
docker compose logs -f

# 특정 서비스만 시작
docker compose up -d postgres redis
```

## Laravel 설정

`.env` 파일에 다음 설정 추가:

```env
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=laravel
DB_USERNAME=postgres
DB_PASSWORD=postgres

CACHE_STORE=redis
SESSION_DRIVER=redis
QUEUE_CONNECTION=redis
REDIS_HOST=127.0.0.1
REDIS_PORT=6379

FILESYSTEM_DISK=s3
AWS_ACCESS_KEY_ID=minioadmin
AWS_SECRET_ACCESS_KEY=minioadmin
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=laravel
AWS_ENDPOINT=http://127.0.0.1:9000
AWS_USE_PATH_STYLE_ENDPOINT=true
```
