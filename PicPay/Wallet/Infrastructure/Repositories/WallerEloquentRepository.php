<?php

namespace PicPay\Wallet\Infrastructure\Repositories;

use PicPay\Shared\Infrastructure\Repositories\BaseRepository;
use PicPay\Wallet\Domain\Repositories\WalletRepository;
use PicPay\Wallet\Infrastructure\Models\Wallet;

class WallerEloquentRepository extends BaseRepository implements WalletRepository
{
    protected string $model = Wallet::class;

    public function userAlreadyHasWallet(int $userId): bool
    {
        return $this->getModel()
            ->newQuery()
            ->where('user_id', $userId)
            ->exists();
    }
}
