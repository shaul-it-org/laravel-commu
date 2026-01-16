<?php

declare(strict_types=1);

namespace App\Exceptions\Business;

use Throwable;

class DuplicateResourceException extends BusinessException
{
    public function __construct(
        string $resourceName,
        string $field,
        string $value,
        ?Throwable $previous = null
    ) {
        $message = "{$resourceName}의 {$field}({$value})이(가) 이미 존재합니다.";
        $errorCode = strtoupper($resourceName).'_DUPLICATE';

        parent::__construct($message, $errorCode, 409, $previous);

        $this->withContext([
            'resource' => $resourceName,
            'field' => $field,
            'value' => $value,
        ]);
    }
}
