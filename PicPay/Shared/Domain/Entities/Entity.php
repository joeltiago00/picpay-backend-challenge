<?php

namespace PicPay\Shared\Domain\Entities;

interface Entity
{
    public static function makeFromArray(array $data): self;
}
