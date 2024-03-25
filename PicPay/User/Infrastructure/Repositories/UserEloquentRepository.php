<?php

namespace PicPay\User\Infrastructure\Repositories;

use Illuminate\Database\Eloquent\Builder;
use PicPay\CoreDomain\Infrastructure\Classes\Collection;
use PicPay\Shared\Infrastructure\Repositories\BaseRepository;
use PicPay\User\Domain\Repositories\UserRepository;
use PicPay\User\Infrastructure\Models\User as UserModel;

class UserEloquentRepository extends BaseRepository implements UserRepository
{
    protected string $model = UserModel::class;

    public function indexWithFilters(array $filters, int $perPage, int $page = 1): Collection
    {
        // TODO:: Handle with pagination
        $results = $this->getModel()
            ->newQuery()
            ->with(['document'])
            ->when(
                isset($filters['first_name']),
                fn(Builder $query) => $query->where('first_name', $filters['first_name'])
            )
            ->when(
                isset($filters['last_name']),
                fn(Builder $query) => $query->where('last_name', $filters['last_name'])
            )
            ->when(
                isset($filters['email']),
                fn(Builder $query) => $query->where('email', $filters['email'])
            )
            ->get();

        return $this->getModel()->toCollection($results, ['document']);
    }
}
