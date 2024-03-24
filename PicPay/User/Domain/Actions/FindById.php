<?php

namespace PicPay\User\Domain\Actions;

use PicPay\User\Domain\Entities\User;
use PicPay\User\Domain\Repositories\UserRepository;

readonly class FindById
{
    public function __construct(private UserRepository $userRepository)
    {
    }

    public function handle(int $id): User
    {
        return $this->userRepository->findById($id);
    }
}
