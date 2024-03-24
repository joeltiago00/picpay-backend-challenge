<?php

namespace PicPay\User\Aplication;

use PicPay\User\Domain\Actions\FindById;
use PicPay\User\Domain\Actions\UserUpdate;
use PicPay\User\Domain\Exceptions\UserException;

readonly class Update
{
    public function __construct(
        private UserUpdate $userUpdate,
        private FindById $findById
    ){
    }

    public function handle(int $userId, array $payload): void
    {
        $user = $this->findById->handle($userId);

        if (array_key_exists('first_name', $payload) && is_null($payload['first_name'])) {
            throw UserException::firstNameCannotBeNull();
        }

        $user->first_name = $payload['first_name'] ?? $user->first_name;
        $user->last_name = $payload['last_name'] ?? $user->last_name;
        $user->updated_at = now();

        if (!$this->userUpdate->handle($user)) {
            throw UserException::notUpdated();
        }
    }
}
