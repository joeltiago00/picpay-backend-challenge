<?php

namespace PicPay\User\Domain\Actions;

use PicPay\User\Domain\DTO\DocumentDTO;
use PicPay\User\Domain\Entities\Document;
use PicPay\User\Domain\Repositories\UserDocumentRepository;

readonly class UserDocumentStore
{
    public function __construct(private UserDocumentRepository $userDocumentRepository)
    {
    }

    public function handle(DocumentDTO $dto): Document
    {
        return $this->userDocumentRepository->store($dto);
    }
}
