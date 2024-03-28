<?php

namespace PicPay\Message\Domain\Factories\SMS;

use PicPay\Message\Application\SMS;
use PicPay\Message\Domain\Contracts\MessageService;

class SMSFactory
{
    public static function create(): MessageService
    {
        return app(SMS::class);
    }
}
