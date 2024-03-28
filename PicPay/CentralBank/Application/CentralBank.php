<?php

namespace PicPay\CentralBank\Application;

use PicPay\CentralBank\Domain\Contracts\AuthorizationService;
use PicPay\CentralBank\Domain\Contracts\CentralBankService as CentralBankServiceInterface;

readonly class CentralBank implements CentralBankServiceInterface
{
    public function __construct(private Authorization $authorization)
    {
    }

    public function authorization(): AuthorizationService
    {
        return $this->authorization;
    }
}
