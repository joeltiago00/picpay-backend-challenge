<?php

namespace PicPay\Wallet\Domain\Listeners;

use PicPay\Wallet\Application\Store;
use PicPay\Wallet\Domain\Events\CreateUserWallet;

readonly class CreateUserWalletListener
{
    public function __construct(private Store $action)
    {
    }

    public function handle(CreateUserWallet $event): void
    {
        $this->action->handle($event->user->id);
    }
}
