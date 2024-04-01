<?php

namespace PicPay\Transaction\Domain\Action;

use PicPay\Transaction\Domain\DTO\TransactionDTO;
use PicPay\Transaction\Domain\Entities\Transaction;
use PicPay\Transaction\Domain\Repositories\TransactionRepository;

readonly class StoreTransaction
{
    public function __construct(private TransactionRepository $transactionRepository)
    {
    }

    public function handle(array $data): Transaction
    {
        $dto = new TransactionDTO(
            $data['payer_wallet_id'],
            $data['payee_wallet_id'],
            $data['amount'],
            $data['status_id'],
            $data['type_id'],
            $data['transaction_refund_id'] ?? null,
            $data['refund_reason'] ?? null
        );

        return $this->transactionRepository->store($dto);
    }
}
