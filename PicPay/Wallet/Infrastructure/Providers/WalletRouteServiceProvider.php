<?php

namespace PicPay\Wallet\Infrastructure\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Route;

class WalletRouteServiceProvider extends RouteServiceProvider
{
    public function boot()
    {
        Route::prefix('wallet')
            ->name('wallet')
            ->group(function () {
                // Implement routes here...
            });
    }
}
