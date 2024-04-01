<?php

namespace PicPay\User\Domain\Repositories;

use PicPay\CoreDomain\Infrastructure\Classes\Collection;

interface UserRepository
{
    public function indexWithFilters(array $filters, int $perPage, int $page = 1): Collection;

    public function getTypeById(int $id): int;
}
