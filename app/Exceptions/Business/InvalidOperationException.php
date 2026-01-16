<?php

declare(strict_types=1);

namespace App\Exceptions\Business;

use Throwable;

class InvalidOperationException extends BusinessException
{
    public function __construct(
        string $operation,
        string $message,
        ?Throwable $previous = null
    ) {
        $errorCode = strtoupper($operation).'_INVALID';

        parent::__construct($message, $errorCode, 422, $previous);

        $this->withContext([
            'operation' => $operation,
        ]);
    }
}
