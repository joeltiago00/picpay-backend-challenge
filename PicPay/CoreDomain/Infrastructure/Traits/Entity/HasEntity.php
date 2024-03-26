<?php

namespace PicPay\CoreDomain\Infrastructure\Traits\Entity;

use PicPay\CoreDomain\Contracts\Entity;

trait HasEntity
{
    use ToEntity, ToEntityCollection;

    public function getEntity(): string
    {
        return $this->baseEntity;
    }
}
