<?php

namespace PicPay\User\Domain\Actions;

use PicPay\CoreDomain\Infrastructure\Classes\Collection;
use PicPay\User\Domain\Repositories\UserRepository;

readonly class IndexUser
{
    public function __construct(private UserRepository $userRepository)
    {
    }

    public function handle(array $filters): Collection
    {
        return $this->userRepository->indexWithFilters($filters, 10);
    }
}
