<?php

namespace PicPay\User\Infrastructure\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Route;
use PicPay\User\Presentation\Controllers\StoreController;

class UserRouteServiceProvider extends RouteServiceProvider
{
    public function boot(): void
    {
        Route::prefix('users')
            ->name('users.')
            ->group(function () {
                Route::post('', StoreController::class)
                    ->name('store');
            });
    }
}
