<?php

namespace PicPay\Shared\Infrastructure\Traits;

use Illuminate\Database\Eloquent\Model;
use PicPay\Shared\Infrastructure\Collection;

trait ToCollection
{
    protected function toCollection(array $items = []): Collection
    {
        return new Collection($items);
    }
}
