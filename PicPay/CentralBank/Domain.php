<?php

namespace PicPay\CentralBank;

use PicPay\CentralBank\Infrastructure\Providers\CentralBankServiceProvider;
use PicPay\CoreDomain\AbstractDomain;

class Domain extends AbstractDomain
{
    public function registerProvider(): array
    {
        return [
            CentralBankServiceProvider::class
        ];
    }
}
