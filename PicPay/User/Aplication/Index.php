<?php

namespace PicPay\User\Aplication;

use PicPay\CoreDomain\Infrastructure\Classes\Collection;
use PicPay\User\Domain\Actions\IndexUser;

readonly class Index
{
    public function __construct(private IndexUser $indexUser)
    {
    }

    public function handle(array $filters): Collection
    {
        return $this->indexUser->handle($filters);
    }
}
