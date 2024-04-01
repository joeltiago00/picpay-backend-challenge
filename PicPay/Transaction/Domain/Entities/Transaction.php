<?php

namespace PicPay\Transaction\Domain\Entities;

use PicPay\Shared\Domain\Entities\BaseEntity;

class Transaction extends BaseEntity
{
    public function __construct(
        public readonly string $id,
        public string          $payerWalletId,
        public string          $payeeWalletId,
        public int             $amount,
        public int             $statusId,
        public int             $typeId,
        public ?string         $transactionRefundId = null,
        public ?string         $refundReason = null
    ){
    }

    public static function makeFromArray(array $data): self
    {
        return new self(
            $data['id'],
            $data['payer_wallet_id'],
            $data['payee_wallet_id'],
            $data['amount'],
            $data['status_id'],
            $data['type_id'],
            $data['transaction_refund_id'] ?? null,
            $data['refund_reason'] ?? null
        );
    }
}
