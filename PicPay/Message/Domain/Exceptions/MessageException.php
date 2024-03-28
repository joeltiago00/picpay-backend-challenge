<?php

namespace PicPay\Message\Domain\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\Response;

class MessageException extends Exception
{
    public static function invalidService(string $service): self
    {
        return new self(
            trans('exceptions.message.invalid-service', ['service' => $service]),
            Response::HTTP_INTERNAL_SERVER_ERROR
        );
    }
}
