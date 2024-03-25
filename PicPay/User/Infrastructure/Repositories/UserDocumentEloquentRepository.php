<?php

namespace PicPay\User\Infrastructure\Repositories;

use PicPay\Shared\Infrastructure\Repositories\BaseRepository;
use PicPay\User\Domain\Entities\Document;
use PicPay\User\Domain\Repositories\UserDocumentRepository;
use PicPay\User\Infrastructure\Models\UserDocument;

class UserDocumentEloquentRepository extends BaseRepository implements UserDocumentRepository
{
    protected string $model = UserDocument::class;

    protected string $baseEntity = Document::class;

    public function getByValue(string $value): ?Document
    {
        $model = $this->getModel()
            ->newQuery()
            ->where('value', $value)
            ->first();

        if (!$model) {
            return null;
        }

        /** @var Document */
        return $this->getModel()->toEntity($model);
    }
}
