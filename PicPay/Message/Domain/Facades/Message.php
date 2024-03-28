<?php

namespace PicPay\Message\Domain\Facades;

use PicPay\CoreDomain\Infrastructure\Facades\BaseFacade;
use PicPay\Message\Domain\Enums\FacadeEnum;

/**
 * @method static service(string $service = 'sms'): MessageService
 * @method static send(string $phoneNumber, string $message): bool
 */
class Message extends BaseFacade
{
    protected static function getFacadeAccessor(): string
    {
        return FacadeEnum::MESSAGE->getAccessor();
    }
}
