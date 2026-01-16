<?php

declare(strict_types=1);

namespace App\Exceptions\Http;

use Throwable;

class ValidationException extends HttpException
{
    public function __construct(
        string $message = '입력값이 유효하지 않습니다.',
        array $details = [],
        ?Throwable $previous = null
    ) {
        parent::__construct($message, 'VALIDATION_ERROR', 422, $previous);
        $this->withDetails($details);
    }
}
