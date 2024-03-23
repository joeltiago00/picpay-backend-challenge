<?php

namespace PicPay\Shared\Domain\Repositories;

use PicPay\Shared\Domain\Entities\BaseEntity;

interface Delete
{
    public function deleteId(int|string $id): bool;
}
