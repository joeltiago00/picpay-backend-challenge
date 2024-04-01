<?php

namespace PicPay\Transaction\Infrastructure\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Route;
use PicPay\Transaction\Presentation\Controllers\MakeTransactionController;

class TransactionRouteServiceProvider extends RouteServiceProvider
{
    public function register(): void
    {
        Route::prefix('transactions')
            ->name('transactions.')
            ->group(function () {
                Route::post('', MakeTransactionController::class)->name('make');
            });
    }
}
