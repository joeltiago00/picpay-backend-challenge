<?php

namespace PicPay\CoreDomain\Contracts\Repositories;

use PicPay\Shared\Domain\Entities\BaseEntity;

interface Update
{
    public function update(BaseEntity $entity): bool;
}
