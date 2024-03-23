<?php

namespace PicPay\User\Infrastructure\Repositories;

use PicPay\Shared\Infrastructure\Repositories\BaseRepository;
use PicPay\User\Domain\Entities\User;
use PicPay\User\Domain\Repositories\UserRepository;
use PicPay\User\Infrastructure\Models\User as UserModel;

class UserEloquentRepository extends BaseRepository implements UserRepository
{
    protected string $model = UserModel::class;

    protected string $baseEntity = User::class;
}
