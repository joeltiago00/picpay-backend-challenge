<?php

namespace PicPay\Shared\Domain\Contracts;

interface Client
{
    public function get(string $url);
}
