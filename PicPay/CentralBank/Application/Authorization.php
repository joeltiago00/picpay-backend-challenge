<?php

namespace PicPay\CentralBank\Application;

use PicPay\CentralBank\Domain\Actions\Check;
use PicPay\CentralBank\Domain\Contracts\AuthorizationService;

readonly class Authorization implements AuthorizationService
{
    public function __construct(private Check $check)
    {
    }

    public function check(int $accountId): bool
    {
        return $this->check->handle($accountId);
    }
}
