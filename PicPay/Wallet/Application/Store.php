<?php

namespace PicPay\Wallet\Application;

use PicPay\Wallet\Domain\Actions\StoreWallet;
use PicPay\Wallet\Domain\Actions\UserAlreadyHasWallet;
use PicPay\Wallet\Domain\Entities\Wallet;
use PicPay\Wallet\Domain\Exceptions\WalletException;

readonly class Store
{
    public function __construct(
        private StoreWallet          $storeWallet,
        private UserAlreadyHasWallet $userAlreadyHasWallet
    )
    {
    }

    public function handle(int $userId): Wallet
    {
        if ($this->userAlreadyHasWallet->handle($userId)) {
            throw WalletException::userAlreadyHasWallet();
        }

        return $this->storeWallet->handle($userId);
    }
}
