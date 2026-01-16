<?php

declare(strict_types=1);

namespace App\Exceptions;

use Exception;
use Illuminate\Http\JsonResponse;
use Throwable;

abstract class BaseException extends Exception
{
    protected string $errorCode;

    protected array $context = [];

    protected array $details = [];

    public function __construct(
        string $message = '',
        string $errorCode = 'ERROR',
        int $httpStatusCode = 500,
        ?Throwable $previous = null
    ) {
        $this->errorCode = $errorCode;

        parent::__construct($message, $httpStatusCode, $previous);
    }

    public function getErrorCode(): string
    {
        return $this->errorCode;
    }

    public function getHttpStatusCode(): int
    {
        return $this->getCode();
    }

    public function withContext(array $context): static
    {
        $this->context = $context;

        return $this;
    }

    public function getContext(): array
    {
        return $this->context;
    }

    public function withDetails(array $details): static
    {
        $this->details = $details;

        return $this;
    }

    public function getDetails(): array
    {
        return $this->details;
    }

    public function toArray(): array
    {
        $error = [
            'code' => $this->errorCode,
            'message' => $this->getMessage(),
        ];

        if (! empty($this->details)) {
            $error['details'] = $this->details;
        }

        return [
            'success' => false,
            'error' => $error,
        ];
    }

    public function render(): JsonResponse
    {
        return response()->json($this->toArray(), $this->getHttpStatusCode());
    }
}
