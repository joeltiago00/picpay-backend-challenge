<?php

namespace PicPay\Transaction\Domain\Action;

class HasSufficientAmount
{
    public function handle(int $walletAmount, int $transactionAmount): bool
    {
        return (round($walletAmount / 100, 2) - round($transactionAmount / 100, 2)) < 0;
    }
}
