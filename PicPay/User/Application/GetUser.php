<?php

namespace PicPay\User\Application;

use PicPay\User\Domain\Actions\FindById;
use PicPay\User\Domain\Entities\User;

readonly class GetUser
{
    public function __construct(private FindById $findById)
    {
    }

    public function handle(int $id): User
    {
        return $this->findById->handle($id);
    }
}
