<?php

namespace PicPay\CentralBank\Domain\Enums;

enum FacadeEnum: string
{
    case BANK = 'BANK';

    public function getAccessor(): string
    {
        return match ($this) {
            self::BANK => 'CentralBank'
        };
    }
}
