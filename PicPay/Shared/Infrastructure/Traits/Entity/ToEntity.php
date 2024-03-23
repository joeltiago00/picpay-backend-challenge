<?php

namespace PicPay\Shared\Infrastructure\Traits\Entity;

use Illuminate\Database\Eloquent\Model;
use PicPay\Shared\Domain\Entities\Entity;

trait ToEntity
{
    public function toEntity(Model $model): Entity
    {
        return $this->baseEntity::makeFromArray($model->toArray());
    }
}
