<?php

namespace PicPay\User\Application;

use PicPay\User\Domain\Actions\GetTypeById;
use PicPay\User\Infrastructure\Enums\TypeEnum;

readonly class GetUserType
{
    public function __construct(private GetTypeById $getTypeById)
    {
    }

    public function handle(int $id): TypeEnum
    {
        return TypeEnum::tryFrom(
            $this->getTypeById->handle($id)
        );
    }
}
