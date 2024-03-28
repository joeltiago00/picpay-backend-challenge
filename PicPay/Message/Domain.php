<?php

namespace PicPay\Message;

use PicPay\CoreDomain\AbstractDomain;
use PicPay\Message\Infrastructure\Providers\MessageServiceProvider;

class Domain extends AbstractDomain
{
    public function registerProvider(): array
    {
        return [
            MessageServiceProvider::class
        ];
    }
}
