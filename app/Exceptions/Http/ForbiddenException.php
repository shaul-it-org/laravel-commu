<?php

declare(strict_types=1);

namespace App\Exceptions\Http;

use Throwable;

class ForbiddenException extends HttpException
{
    public function __construct(
        string $message = '접근 권한이 없습니다.',
        ?Throwable $previous = null
    ) {
        parent::__construct($message, 'FORBIDDEN', 403, $previous);
    }
}
