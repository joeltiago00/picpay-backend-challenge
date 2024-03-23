<?php

namespace PicPay\User\Domain\Entities;

use PicPay\Shared\Domain\Entities\BaseEntity;

class Document extends BaseEntity
{

    public function __construct(
        public readonly int $id,
        public readonly int $userId,
        public readonly int $typeId,
        public string $value
    ) {
    }


    public static function makeFromArray(array $data): self
    {
        return new self(
            $data['id'],
            $data['user_id'],
            $data['type_id'],
            $data['value']
        );
    }
}
