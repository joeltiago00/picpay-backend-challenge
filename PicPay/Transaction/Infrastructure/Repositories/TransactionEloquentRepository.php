<?php

namespace PicPay\Transaction\Infrastructure\Repositories;

use PicPay\Shared\Infrastructure\Repositories\BaseRepository;
use PicPay\Transaction\Domain\Repositories\TransactionRepository;
use PicPay\Transaction\Infrastructure\Models\Transaction;

class TransactionEloquentRepository extends BaseRepository implements TransactionRepository
{
    protected string $model = Transaction::class;
}
