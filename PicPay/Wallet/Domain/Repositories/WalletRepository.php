<?php

namespace PicPay\Wallet\Domain\Repositories;

interface WalletRepository
{
    public function userAlreadyHasWallet(int $userId): bool;
}
