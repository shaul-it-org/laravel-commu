<?php

declare(strict_types=1);

namespace App\Exceptions\Http;

use Throwable;

class UnauthorizedException extends HttpException
{
    public function __construct(
        string $message = '인증이 필요합니다.',
        ?Throwable $previous = null
    ) {
        parent::__construct($message, 'UNAUTHORIZED', 401, $previous);
    }
}
