<?php

namespace PicPay\Wallet\Infrastructure\Providers;

use App\Providers\AppServiceProvider;
use Illuminate\Support\Facades\Event;
use PicPay\Wallet\Domain\Events\CreateUserWallet;
use PicPay\Wallet\Domain\Listeners\CreateUserWalletListener;
use PicPay\Wallet\Domain\Repositories\WalletRepository;
use PicPay\Wallet\Infrastructure\Repositories\WallerEloquentRepository;

class WalletServiceProvider extends AppServiceProvider
{
    public function register(): void
    {
        app()->bind(WalletRepository::class, WallerEloquentRepository::class);
    }

    public function boot(): void
    {
        Event::listen(CreateUserWallet::class, CreateUserWalletListener::class);
    }


}
