<?php

namespace PicPay\Shared\Domain\Repositories;

use PicPay\Shared\Domain\Entities\Entity;

interface FindById
{
    public function findById(int|string $id): Entity;
}
