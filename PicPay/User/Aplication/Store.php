<?php

namespace PicPay\User\Aplication;

use PicPay\Shared\Infrastructure\Enums\StatusEnum;
use PicPay\User\Domain\Actions\UserDocumentStore;
use PicPay\User\Domain\Actions\UserStore;
use PicPay\User\Domain\DTO\DocumentDTO;
use PicPay\User\Domain\DTO\UserDTO;
use PicPay\User\Domain\Entities\User;
use PicPay\Wallet\Domain\Events\CreateUserWallet;

readonly class Store
{
    public function __construct(
        private UserStore         $userStore,
        private UserDocumentStore $userDocumentStore
    )
    {
    }

    public function handle(array $payload): User
    {
        $usetDto = new UserDTO(
            $payload['first_name'],
            $payload['last_name'] ?? null,
            $payload['email'],
            $payload['password'],
            $payload['type_id'],
            StatusEnum::ACTIVE->value
        );

        $user = $this->userStore->handle($usetDto);

        $documentDto = new DocumentDTO(
            $user->id,
            $payload['document']['type_id'],
            $payload['document']['value']
        );

        $user->document = $this->userDocumentStore->handle($documentDto);

        CreateUserWallet::dispatch($user);

        return $user;
    }
}
