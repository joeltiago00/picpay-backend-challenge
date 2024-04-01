<?php

namespace PicPay\Wallet\Domain\Actions;

use PicPay\Wallet\Domain\Entities\Wallet;
use PicPay\Wallet\Domain\Repositories\WalletRepository;

readonly class GetWallet
{
    public function __construct(private WalletRepository $walletRepository)
    {
    }

    public function handle(string $id, array $relationships = []): Wallet
    {
        return $this->walletRepository->findById($id, $relationships);
    }
}
