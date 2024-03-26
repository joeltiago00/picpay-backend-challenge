<?php

namespace PicPay\Wallet\Domain\Actions;

use PicPay\Wallet\Domain\Repositories\WalletRepository;

readonly class UserAlreadyHasWallet
{
    public function __construct(private WalletRepository $walletRepository)
    {
    }

    public function handle(int $userId): bool
    {
        return $this->walletRepository->userAlreadyHasWallet($userId);
    }
}
