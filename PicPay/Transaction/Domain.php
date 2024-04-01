<?php

namespace PicPay\Transaction;

use PicPay\CoreDomain\AbstractDomain;
use PicPay\Transaction\Infrastructure\Providers\TransactionRouteServiceProvider;
use PicPay\Transaction\Infrastructure\Providers\TransactionServiceProvider;

class Domain extends AbstractDomain
{
    public function registerProvider(): array
    {
        return [
            TransactionServiceProvider::class,
            TransactionRouteServiceProvider::class
        ];
    }
}
