<?php

namespace PicPay\Wallet;

use PicPay\CoreDomain\AbstractDomain;
use PicPay\Wallet\Infrastructure\Providers\WalletRouteServiceProvider;
use PicPay\Wallet\Infrastructure\Providers\WalletServiceProvider;

class Domain extends AbstractDomain
{
    public function registerProvider(): array
    {
        return [
            WalletServiceProvider::class,
            WalletRouteServiceProvider::class
        ];
    }
}
