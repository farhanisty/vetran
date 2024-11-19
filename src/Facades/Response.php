<?php

namespace Farhanisty\Vetran\Facades;

class Response
{
    public const OK = 200;
    public const CREATED = 201;
    public const ACCEPTED = 202;
    public const NO_CONTENT = 204;
    public const BAD_REQUEST = 400;
    public const UNAUTHORIZED = 401;
    public const PAYMENT_REQUIRED = 402;
    public const FORBIDEN = 403;
    public const NOT_FOUND = 404;
    public const METHOD_NOT_ALLOWED = 405;
    public const INTERNAL_SERVER_ERROR = 500;
    public const SERVER_UNAVAILABLE = 503;

    public array $httpMessages;
    private array $headers;
    private string $body = '';

    public function __construct()
    {
        $this->httpMessages = [
            200 => 'OK',
            201 => 'CREATED',
            202 => 'ACCEPTED',
            204 => 'NO_CONTENT',
            400 => 'BAD_REQUEST',
            401 => 'UNAUTHORIZED',
            402 => 'PAYMENT_REQUIRED',
            403 => 'FORBIDEN',
            404 => 'NOT_FOUND',
            405 => 'METHOD_NOT_ALLOWED',
            500 => 'INTERNAL_SERVER_ERROR',
            503 => 'SERVER_UNAVAILABLE'
        ];
    }

    public function setStatus(int $status): self
    {
        return $this->setHeader("HTTP/1.1 $status {$this->httpMessages[$status]}");
    }

    public function responseJson(): self
    {
        return $this->setHeader('Content-Type: application/json');
    }

    public function setBody(array $data): self
    {
        $this->body = json_encode($data);

        return $this;
    }

    public function setRawBody(string $raw): self
    {
        $this->body = $raw;

        return $this;
    }

    public function setHeader(string $header): self
    {
        $this->headers[] = $header;
        return $this;
    }

    public function build(): void
    {
        foreach ($this->headers as $header) {
            header($header);
        }

        echo $this->body;
    }
}
