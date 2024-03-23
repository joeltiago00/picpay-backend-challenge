<?php

namespace PicPay\User;

use PicPay\CoreDomain\AbstractDomain;
use PicPay\User\Infrastructure\Providers\UserRouteServiceProvider;
use PicPay\User\Infrastructure\Providers\UserServiceProvider;

class Domain extends AbstractDomain
{
    public function registerProvider(): array
    {
        return [
            UserServiceProvider::class,
            UserRouteServiceProvider::class
        ];
    }
}
