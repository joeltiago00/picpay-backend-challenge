<?php

namespace PicPay\Transaction\Domain\DTO;

use PicPay\Shared\Domain\DTO\BaseDTO;

class TransactionDTO extends BaseDTO
{
    public function __construct(
        public readonly string $payerWalletId,
        public readonly string $payeeWalletId,
        public readonly int    $amount,
        public readonly int    $statusId,
        public readonly int    $typeId,
        public ?string         $transactionRefundId = null,
        public ?string         $refundReason = null
    ) {
    }
}
