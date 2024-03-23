<?php

namespace PicPay\Shared\Domain\Repositories;

use PicPay\Shared\Domain\Entities\Entity;

interface GetById
{
    public function getById(int|string $id): ?Entity;
}
