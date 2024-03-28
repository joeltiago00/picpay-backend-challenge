<?php

namespace PicPay\CentralBank\Domain\Contracts;

interface AuthorizationService
{
    public function check(int $accountId): bool;
}
