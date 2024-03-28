<?php

namespace PicPay\Message\Domain\Factories;

use PicPay\Message\Domain\Contracts\MessageService;
use PicPay\Message\Domain\Exceptions\MessageException;
use PicPay\Message\Domain\Factories\SMS\SMSFactory;

class MessageFactory
{
    public static function handle(string $service): MessageService
    {
        return match ($service) {
            'sms' => SMSFactory::create(),
            default => throw MessageException::invalidService($service)
        };
    }
}
