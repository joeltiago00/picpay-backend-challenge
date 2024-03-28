<?php

namespace PicPay\CentralBank\Domain\Contracts;

interface CentralBankService
{
    public function authorization(): AuthorizationService;
}
