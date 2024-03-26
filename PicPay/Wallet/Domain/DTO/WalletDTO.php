<?php

namespace PicPay\Wallet\Domain\DTO;

use PicPay\Shared\Domain\DTO\BaseDTO;

class WalletDTO extends BaseDTO
{
    public function __construct(public readonly int $userId)
    {
    }
}
