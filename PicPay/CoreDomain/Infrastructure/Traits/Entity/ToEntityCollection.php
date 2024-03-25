<?php

namespace PicPay\CoreDomain\Infrastructure\Traits\Entity;

use Illuminate\Database\Eloquent\Collection as EloquentCollection;
use Illuminate\Database\Eloquent\Model;
use PicPay\CoreDomain\Infrastructure\Classes\Collection;

trait ToEntityCollection
{
    public function toCollection(EloquentCollection $items, array $relationships = []): Collection
    {
        return new Collection(
            $items->map(function (Model $model) use ($relationships) {
                $entity = $this->baseEntity::makeFromArray($model->toArray());

                foreach ($relationships as $relationship) {
                    $modelRelationship = $model[$relationship];

                    if (is_null($modelRelationship)) {
                        continue;
                    }

                    $entity->{$relationship} = $modelRelationship->getEntity()::makeFromArray($modelRelationship->toArray());
                }

                return $entity;
            })->toArray()
        );
    }
}
