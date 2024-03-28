<?php

namespace PicPay\Shared\Infrastructure\Client;

use Illuminate\Http\Client\Response as IlluminateResponse;

readonly class Response
{
    public function __construct(private IlluminateResponse $response)
    {
    }

    public function __get(string $name): mixed
    {
        return $this->response->{$name};
    }

    public function __call(string $name, array $arguments)
    {
        return $this->response->{$name}(...$arguments);
    }
}
