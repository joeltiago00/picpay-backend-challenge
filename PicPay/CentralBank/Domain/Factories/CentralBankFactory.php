<?php

namespace PicPay\CentralBank\Domain\Factories;

use PicPay\CentralBank\Application\CentralBank;
use PicPay\CentralBank\Domain\Contracts\CentralBankService;

class CentralBankFactory
{
    public static function create(): CentralBankService
    {
        return app(CentralBank::class);
    }
}
