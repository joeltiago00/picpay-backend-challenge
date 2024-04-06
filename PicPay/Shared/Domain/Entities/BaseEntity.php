<?php

namespace PicPay\Shared\Domain\Entities;

use PicPay\CoreDomain\Contracts\Entity;
use PicPay\CoreDomain\Infrastructure\Traits\ToArray;

abstract class BaseEntity implements Entity
{
    use ToArray;

    public array $relationships = [];

    public function __get(string $name): mixed
    {
        return isset($this->relationships[snakeCaseToCamelCase($name)])
            ? $this->relationships[snakeCaseToCamelCase($name)]
            : $this->{snakeCaseToCamelCase($name)} ?? null;
    }

    public function __set(string $name, mixed $value): void
    {
        $propName = snakeCaseToCamelCase($name);

        if (!property_exists($this, $propName)) {
            $this->relationships[snakeCaseToCamelCase($name)] = $value;

            return;
        }

        $this->{$propName} = $value;
    }
}
