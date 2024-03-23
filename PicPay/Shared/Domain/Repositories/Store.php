<?php

namespace PicPay\Shared\Domain\Repositories;

use PicPay\Shared\Domain\DTO\BaseDTO;
use PicPay\Shared\Domain\Entities\Entity;

interface Store
{
    public function store(BaseDTO $dto): Entity;
}
