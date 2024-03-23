<?php

namespace PicPay\User\Domain\Actions;

use PicPay\Shared\Infrastructure\Enums\StatusEnum;
use PicPay\User\Domain\DTO\DocumentDTO;
use PicPay\User\Domain\DTO\UserDTO;
use PicPay\User\Domain\Entities\User;
use PicPay\User\Domain\Repositories\UserDocumentRepository;
use PicPay\User\Domain\Repositories\UserRepository;

readonly class Store
{
    public function __construct(
        private UserRepository         $userRepository,
        private UserDocumentRepository $userDocumentRepository
    ) {
    }

    public function handle(array $payload): User
    {
        $user = $this->userRepository
            ->store(
                new UserDTO(
                    $payload['first_name'],
                    $payload['last_name'] ?? null,
                    $payload['email'],
                    $payload['password'],
                    $payload['type_id'],
                    StatusEnum::ACTIVE->value
                )
            );


        $document = $this->userDocumentRepository->store(
            new DocumentDTO(
                $user->id,
                $payload['document']['type_id'],
                $payload['document']['value']
            )
        );

        $user->document = $document;

        return $user;
    }
}
