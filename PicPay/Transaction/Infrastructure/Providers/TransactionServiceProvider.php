<?php

namespace PicPay\Transaction\Infrastructure\Providers;

use App\Providers\AppServiceProvider;
use PicPay\Transaction\Domain\Repositories\TransactionRepository;
use PicPay\Transaction\Infrastructure\Repositories\TransactionEloquentRepository;

class TransactionServiceProvider extends AppServiceProvider
{
    public function register(): void
    {
        app()->bind(TransactionRepository::class, fn() => app(TransactionEloquentRepository::class));
    }
}
