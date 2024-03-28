<?php

namespace PicPay\CentralBank\Domain\Contracts;

interface Client
{
    public function get(string $url);
}
