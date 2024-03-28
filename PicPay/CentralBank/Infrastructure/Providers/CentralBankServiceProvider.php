<?php

namespace PicPay\CentralBank\Infrastructure\Providers;

use App\Providers\AppServiceProvider;
use PicPay\CentralBank\Domain\Enums\FacadeEnum;
use PicPay\CentralBank\Domain\Factories\CentralBankFactory;

class CentralBankServiceProvider extends AppServiceProvider
{
    public function register(): void
    {
        app()->singleton(FacadeEnum::BANK->getAccessor(), fn() => CentralBankFactory::create());
    }
}
