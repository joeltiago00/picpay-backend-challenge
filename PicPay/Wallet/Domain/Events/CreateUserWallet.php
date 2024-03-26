<?php

namespace PicPay\Wallet\Domain\Events;

use PicPay\User\Domain\Entities\User;
use PicPay\Wallet\Infrastructure\Events\CreateUserWallet as CreateUserWalletEvent;

class CreateUserWallet extends CreateUserWalletEvent
{
    public function __construct(public readonly User $user)
    {
    }
}
