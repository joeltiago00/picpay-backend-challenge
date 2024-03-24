<?php

namespace PicPay\User\Domain\Actions;

use PicPay\User\Domain\Entities\User;
use PicPay\User\Domain\Repositories\UserRepository;

readonly class UserUpdate
{
    public function __construct(private UserRepository $userRepository)
    {
    }

    public function handle(User $user): bool
    {
        return $this->userRepository->update($user);
    }
}
