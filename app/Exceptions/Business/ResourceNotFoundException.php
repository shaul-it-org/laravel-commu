<?php

declare(strict_types=1);

namespace App\Exceptions\Business;

use Throwable;

class ResourceNotFoundException extends BusinessException
{
    public function __construct(
        string $resourceName,
        string|int $identifier,
        ?Throwable $previous = null
    ) {
        $message = "{$resourceName}({$identifier})을(를) 찾을 수 없습니다.";
        $errorCode = strtoupper($resourceName).'_NOT_FOUND';

        parent::__construct($message, $errorCode, 404, $previous);

        $this->withContext([
            'resource' => $resourceName,
            'identifier' => $identifier,
        ]);
    }
}
