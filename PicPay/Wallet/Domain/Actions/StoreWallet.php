<?php

namespace PicPay\Wallet\Domain\Actions;

use PicPay\Wallet\Domain\DTO\WalletDTO;
use PicPay\Wallet\Domain\Entities\Wallet;
use PicPay\Wallet\Domain\Repositories\WalletRepository;

readonly class StoreWallet
{
    public function __construct(private WalletRepository $walletRepository)
    {
    }

    public function handle(int $userId): Wallet
    {
        return $this->walletRepository->store(new WalletDTO($userId));
    }
}
