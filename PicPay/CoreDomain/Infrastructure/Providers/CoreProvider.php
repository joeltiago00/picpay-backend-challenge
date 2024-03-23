<?php

namespace PicPay\CoreDomain\Infrastructure\Providers;

use Illuminate\Support\ServiceProvider;
use PicPay\CoreDomain\Core\DomainManager;

class CoreProvider extends ServiceProvider
{
    public function register(): void
    {
        $providers = DomainManager::instance()->getproviders();
        foreach ($providers as $provider) {
            $this->app->register($provider);
        }
    }
}
