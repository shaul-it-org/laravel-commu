<?php

declare(strict_types=1);

namespace App\Exceptions\Http;

use Throwable;

class InternalServerException extends HttpException
{
    public function __construct(
        string $message = '서버 내부 오류가 발생했습니다.',
        ?Throwable $previous = null
    ) {
        parent::__construct($message, 'INTERNAL_SERVER_ERROR', 500, $previous);
    }
}
