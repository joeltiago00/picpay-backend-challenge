<?php

namespace PicPay\Message\Domain\Enums;

enum FacadeEnum: string
{
    case MESSAGE = 'MESSAGE';

    public function getAccessor(): string
    {
        return match ($this) {
            self::MESSAGE => 'Message'
        };
    }
}
