<?php

declare(strict_types=1);

namespace App\Exceptions\Http;

use Throwable;

class BadRequestException extends HttpException
{
    public function __construct(
        string $message = '잘못된 요청입니다.',
        ?Throwable $previous = null
    ) {
        parent::__construct($message, 'BAD_REQUEST', 400, $previous);
    }
}
