<?php

namespace PicPay\CoreDomain\Infrastructure\Traits;

use PicPay\CoreDomain\Infrastructure\Classes\Collection;

trait ToCollection
{
    protected function toCollection(array $items = []): Collection
    {
        return new Collection($items);
    }
}
