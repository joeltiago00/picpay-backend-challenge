<?php

namespace PicPay\Shared;

use PicPay\CoreDomain\AbstractDomain;
use PicPay\Shared\Infrastructure\Providers\SharedServiceProvider;

class Domain extends AbstractDomain
{
    public function registerProvider(): array
    {
        return [
            SharedServiceProvider::class
        ];
    }
}
