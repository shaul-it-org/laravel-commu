<?php

declare(strict_types=1);

namespace App\Exceptions\Business;

use App\Exceptions\BaseException;
use Throwable;

abstract class BusinessException extends BaseException
{
    public function __construct(
        string $message,
        string $errorCode,
        int $httpStatusCode = 400,
        ?Throwable $previous = null
    ) {
        parent::__construct($message, $errorCode, $httpStatusCode, $previous);
    }
}
