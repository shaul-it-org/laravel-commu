<?php

declare(strict_types=1);

namespace App\Exceptions\Http;

use App\Exceptions\BaseException;
use Throwable;

abstract class HttpException extends BaseException
{
    public function __construct(
        string $message,
        string $errorCode,
        int $httpStatusCode,
        ?Throwable $previous = null
    ) {
        parent::__construct($message, $errorCode, $httpStatusCode, $previous);
    }
}
