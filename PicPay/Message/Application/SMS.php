<?php

namespace PicPay\Message\Application;

use PicPay\Message\Domain\Actions\SMS\Send;
use PicPay\Message\Domain\Contracts\MessageService;
use PicPay\Message\Domain\Factories\MessageFactory;

readonly class SMS implements MessageService
{
    public function __construct(private Send $send)
    {
    }

    public function send(string $phoneNumber, string $message): bool
    {
        return $this->send->handle($phoneNumber, $message);
    }

    public static function service(string $service = 'sms'): MessageService
    {
        return MessageFactory::handle($service);
    }
}
