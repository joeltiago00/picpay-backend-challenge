<?php

namespace PicPay\User\Domain\Actions;

use PicPay\User\Domain\Exceptions\UserException;
use PicPay\User\Domain\Repositories\UserRepository;

readonly class Update
{
    public function __construct(private UserRepository $userRepository)
    {
    }

    public function handle(int $userId, array $payload): void
    {
        $user = $this->userRepository
            ->findById($userId);

        if (array_key_exists('first_name', $payload) && is_null($payload['first_name'])) {
            throw UserException::firstNameCannotBeNull();
        }

        $user->first_name = $payload['first_name'] ?? $user->first_name;
        $user->last_name = $payload['last_name'] ?? $user->last_name;
        $user->updated_at = now();

        if (!$this->userRepository->update($user)) {
            throw UserException::notUpdated();
        }
    }
}
