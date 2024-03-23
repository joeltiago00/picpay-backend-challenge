<?php

namespace PicPay\CoreDomain\Contracts;

interface Entity
{
    public static function makeFromArray(array $data): self;
}
