<?php

namespace PicPay\Shared\Infrastructure\Repositories;

use Illuminate\Database\Eloquent\Model;
use PicPay\Shared\Domain\DTO\BaseDTO;
use PicPay\Shared\Domain\Entities\BaseEntity;
use PicPay\Shared\Domain\Entities\Entity;
use PicPay\Shared\Domain\Repositories\Delete;
use PicPay\Shared\Domain\Repositories\FindById;
use PicPay\Shared\Domain\Repositories\GetById;
use PicPay\Shared\Domain\Repositories\Store;
use PicPay\Shared\Domain\Repositories\Update;
use PicPay\Shared\Infrastructure\Traits\Entity\HasEntity;

class BaseRepository implements Store, Update, Delete, FindById, GetById
{
    use HasEntity;

    protected string $model;

    protected string $baseEntity;

    public function deleteId(int|string $id): bool
    {
        return $this->getModel()
            ->newQuery()
            ->where('id', $id)
            ->delete();
    }

    public function findById(int|string $id): Entity
    {
        $model = $this->getModel()
            ->newQuery()
            ->find($id);

        return $this->toEntity($model);
    }

    public function getById(int|string $id): ?Entity
    {
        $model = $this->getModel()
            ->newQuery()
            ->firstWhere('id', $id);

        if (!$model) {
            return null;
        }

        return $this->toEntity($model);
    }

    public function store(BaseDTO $dto): Entity
    {
        $model = $this->getModel()
            ->newQuery()
            ->create($dto->toArray());

        return $this->toEntity($model);
    }

    public function update(BaseEntity $entity): bool
    {
        return $this->getModel()
            ->newQuery()
            ->where('id', $entity->id)
            ->update($entity->toArray());
    }

    protected function getModel(): Model
    {
        return app($this->model);
    }
}
