<?php

namespace PicPay\User\Infrastructure\Providers;

use App\Providers\AppServiceProvider;
use PicPay\User\Domain\Repositories\UserDocumentRepository;
use PicPay\User\Domain\Repositories\UserRepository;
use PicPay\User\Infrastructure\Repositories\UserDocumentEloquentRepository;
use PicPay\User\Infrastructure\Repositories\UserEloquentRepository;

class UserServiceProvider extends AppServiceProvider
{
    public function register(): void
    {
        app()->bind(UserRepository::class, UserEloquentRepository::class);
        app()->bind(UserDocumentRepository::class, UserDocumentEloquentRepository::class);
    }
}
