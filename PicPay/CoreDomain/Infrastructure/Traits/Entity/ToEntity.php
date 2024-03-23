<?php

namespace PicPay\CoreDomain\Infrastructure\Traits\Entity;

use Illuminate\Database\Eloquent\Model;
use PicPay\CoreDomain\Contracts\Entity;

trait ToEntity
{
    public function toEntity(Model $model): Entity
    {
        return $this->baseEntity::makeFromArray($model->toArray());
    }
}
