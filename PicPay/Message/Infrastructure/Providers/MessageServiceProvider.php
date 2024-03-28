<?php

namespace PicPay\Message\Infrastructure\Providers;

use App\Providers\AppServiceProvider;
use PicPay\Message\Application\Message;
use PicPay\Message\Domain\Enums\FacadeEnum;
use PicPay\Message\Domain\Factories\MessageFactory;

class MessageServiceProvider extends AppServiceProvider
{
    public function register(): void
    {
        app()->bind(FacadeEnum::MESSAGE->getAccessor(), fn() => MessageFactory::handle('sms'));
    }
}
