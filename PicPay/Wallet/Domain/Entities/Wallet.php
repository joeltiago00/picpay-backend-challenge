<?php

namespace PicPay\Wallet\Domain\Entities;

use PicPay\Shared\Domain\Entities\BaseEntity;

class Wallet extends BaseEntity
{
    public function __construct(
        public readonly string $id,
        public int $userId
    )
    {
    }

    public static function makeFromArray(array $data): self
    {
        return new self(
            $data['id'],
            $data['user_id']
        );
    }
}
