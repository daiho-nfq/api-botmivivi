<?php

namespace App\Exceptions;

use Symfony\Component\HttpFoundation\Response;

final class JsonApiException extends \Exception
{
    private $e;

    private array $headers;

    private array $errors = [];

    public function __construct(
        $e,
        int $statusCode = Response::HTTP_BAD_REQUEST,
        \Throwable $previous = null,
        array $headers = []
    ) {
        $message = 'JSON API error';

        if (! empty($e) && is_string($e)) {
            $message = $e;
        }

        if ($e instanceof \Exception) {
            $message = $e->getMessage();
        }

        parent::__construct($message, $statusCode, $previous);

        $this->e = $e;
        $this->headers = $headers;
    }

    public function getHeaders(): array
    {
        return $this->headers;
    }

    public function withHeaders(array $headers): self
    {
        $this->headers = $headers;

        return $this;
    }

    public function toArray(): array
    {
        $response['message'] = $this->getNativeMessage();

        if (! empty($this->errors)) {
            $response['errors'] = $this->errors;
        }

        // If debug mode is enabled
        if (config('app.debug')) {
            $response['exception'] = get_class($this);
            $response['trace'] = $this->getTrace();
        }

        return $response;
    }

    public function getNativeMessage(): string
    {
        if ($this->e instanceof ApiExceptionInterface) {
            $this->errors = array_merge($this->errors, $this->e->getErrors());

            return $this->e->getErrorMessage();
        }

        return $this->getMessage();
    }
}
