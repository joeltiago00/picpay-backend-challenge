<?php

namespace PicPay\CoreDomain\Contracts\Repositories;

use PicPay\CoreDomain\Contracts\Entity;
use PicPay\Shared\Domain\DTO\BaseDTO;

interface Store
{
    public function store(BaseDTO $dto): Entity;
}
