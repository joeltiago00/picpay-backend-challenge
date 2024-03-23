<?php

namespace PicPay\User\Presentation\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\Response;

class RuleException extends Exception
{
    public static function cpfAlreadyExists(string $value): self
    {
        return new self(
            trans('exceptions.rules.document-already-exists', ['document' => $value]),
            Response::HTTP_UNPROCESSABLE_ENTITY
        );
    }
}
