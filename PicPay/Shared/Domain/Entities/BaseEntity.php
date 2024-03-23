<?php

namespace PicPay\Shared\Domain\Entities;

use PicPay\CoreDomain\Contracts\Entity;
use PicPay\CoreDomain\Infrastructure\Traits\ToArray;

abstract class BaseEntity implements Entity
{
    use ToArray;

    public function __get(string $name): mixed
    {
        return $this->{snakeCaseToCamelCase($name)};
    }
}
