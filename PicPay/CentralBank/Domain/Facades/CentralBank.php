<?php

namespace PicPay\CentralBank\Domain\Facades;

use PicPay\CentralBank\Domain\Enums\FacadeEnum;
use PicPay\CoreDomain\Infrastructure\Facades\BaseFacade;

/**
 * @method static authorization(): AuthorizationService
 */
class CentralBank extends BaseFacade
{
    protected static function getFacadeAccessor(): string
    {
        return FacadeEnum::BANK->getAccessor();
    }
}
