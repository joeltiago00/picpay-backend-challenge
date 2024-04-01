<?php

namespace PicPay\Transaction\Domain\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\Response;

class TransactionException extends Exception
{
    public static function userNotAuthorized(): self
    {
        return new self(
            trans('exceptions.transaction.user-not-authorized'),
            Response::HTTP_FORBIDDEN
        );
    }

    public static function userDontHaveSufficientAmount(): self
    {
        return new self(
            trans('exceptions.transaction.user-dont-have-sufficient-amount'),
            Response::HTTP_FORBIDDEN
        );
    }
}
