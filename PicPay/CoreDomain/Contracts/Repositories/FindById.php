<?php

namespace PicPay\CoreDomain\Contracts\Repositories;

use PicPay\CoreDomain\Contracts\Entity;

interface FindById
{
    public function findById(int|string $id): Entity;
}
