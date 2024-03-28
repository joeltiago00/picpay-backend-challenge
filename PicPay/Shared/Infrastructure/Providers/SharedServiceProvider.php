<?php

namespace PicPay\Shared\Infrastructure\Providers;

use App\Providers\AppServiceProvider;
use PicPay\Shared\Domain\Contracts\Client;
use PicPay\Shared\Infrastructure\Client\HttpClient;

class SharedServiceProvider extends AppServiceProvider
{
    public function register(): void
    {
        app()->bind(Client::class, HttpClient::class);
    }
}
