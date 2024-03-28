<?php

namespace PicPay\Message\Domain\Contracts;


interface MessageService
{
    public static function service(string $service = 'sms'): MessageService;

    public function send(string $phoneNumber, string $message): bool;
}
