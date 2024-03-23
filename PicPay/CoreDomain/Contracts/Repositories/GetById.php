<?php

namespace PicPay\CoreDomain\Contracts\Repositories;

use PicPay\CoreDomain\Contracts\Entity;

interface GetById
{
    public function getById(int|string $id): ?Entity;
}
