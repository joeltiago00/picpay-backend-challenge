<?php

namespace PicPay\CentralBank\Infrastructure\Providers;

use App\Providers\AppServiceProvider;
use PicPay\CentralBank\Domain\Contracts\Client;
use PicPay\CentralBank\Domain\Enums\FacadeEnum;
use PicPay\CentralBank\Domain\Factories\CentralBankFactory;
use PicPay\CentralBank\Infrastructure\Client\HttpClient;

class CentralBankServiceProvider extends AppServiceProvider
{
    public function register(): void
    {
        app()->bind(Client::class, HttpClient::class);

        app()->singleton(FacadeEnum::BANK->getAccessor(), fn() => CentralBankFactory::create());
    }
}
