<?php

namespace PicPay\User\Domain\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\Response;

class UserException extends Exception
{
    public static function notUpdated(): self
    {
        return new self(
            trans('exceptions.user.not-updated'),
            Response::HTTP_INTERNAL_SERVER_ERROR
        );
    }

    public static function firstNameCannotBeNull(): UserException
    {
        return new self(
            trans('exceptions.user.first-name-cannot-be-null'),
            Response::HTTP_BAD_REQUEST
        );
    }
}
