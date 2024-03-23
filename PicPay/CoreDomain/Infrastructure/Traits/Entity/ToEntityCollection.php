<?php

namespace PicPay\CoreDomain\Infrastructure\Traits\Entity;

use Illuminate\Database\Eloquent\Model;
use PicPay\CoreDomain\Infrastructure\Classes\Collection;

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
