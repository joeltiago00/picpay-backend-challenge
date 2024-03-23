<?php

namespace PicPay\Shared\Domain\Repositories;

use PicPay\Shared\Domain\Entities\BaseEntity;

interface Update
{
    public function update(BaseEntity $entity): bool;
}
