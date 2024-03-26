<?php

namespace PicPay\Wallet\Domain\Exceptions;

use Exception;
use Symfony\Component\HttpFoundation\Response;

class WalletException extends Exception
{
    public static function userAlreadyHasWallet(): self
    {
        return new self(
            trans('exceptions.wallet.user-already-has-waller'),
            Response::HTTP_CONFLICT
        );
    }
}
