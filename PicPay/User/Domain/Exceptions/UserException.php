<?php

namespace PicPay\User\Domain\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\Response;

class UserException extends Exception
{
    public static function notUpdated(): self
    {
        return new self(
            'User not updated. Try again later...',
            Response::HTTP_INTERNAL_SERVER_ERROR
        );
    }
}
