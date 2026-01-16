<?php

declare(strict_types=1);

namespace App\Exceptions\Http;

use Throwable;

class NotFoundException extends HttpException
{
    public function __construct(
        string $message = '리소스를 찾을 수 없습니다.',
        ?Throwable $previous = null
    ) {
        parent::__construct($message, 'NOT_FOUND', 404, $previous);
    }
}
