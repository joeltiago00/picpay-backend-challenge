<?php

namespace PicPay\Shared\Infrastructure\Traits\Entity;

use Illuminate\Database\Eloquent\Model;
use PicPay\Shared\Infrastructure\Collection;

trait ToEntityCollection
{
    protected function toCollection(array $items = []): Collection
    {
        return new Collection(
            array_map(
                fn(Model $model) => $this->getEntity()::makeFromArray($model->toArray()),
                $items
            )
        );
    }
}
