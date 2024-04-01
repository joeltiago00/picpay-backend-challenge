<?php

namespace PicPay\User\Domain\Actions;

use PicPay\User\Domain\Repositories\UserRepository;

readonly class GetTypeById
{
    public function __construct(private UserRepository $userRepository)
    {
    }

    public function handle(int $id): int
    {
        return $this->userRepository->getTypeById($id);
    }
}
