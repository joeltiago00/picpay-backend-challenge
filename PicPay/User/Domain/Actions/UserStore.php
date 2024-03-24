<?php

namespace PicPay\User\Domain\Actions;

use PicPay\User\Domain\DTO\UserDTO;
use PicPay\User\Domain\Entities\User;
use PicPay\User\Domain\Repositories\UserRepository;

readonly class UserStore
{
    public function __construct(private UserRepository $userRepository)
    {
    }

    public function handle(UserDTO $dto): User
    {
        return $this->userRepository->store($dto);
    }
}
