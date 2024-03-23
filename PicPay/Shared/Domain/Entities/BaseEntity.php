<?php

namespace PicPay\Shared\Domain\Entities;

use PicPay\Shared\Infrastructure\Traits\ToArray;

abstract class BaseEntity implements Entity
{
    use ToArray;

    public function __get(string $name): mixed
    {
        return $this->{snakeCaseToCamelCase($name)};
    }
}
