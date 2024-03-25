<?php

namespace PicPay\User\Domain\Entities;

use Illuminate\Support\Carbon;
use PicPay\Shared\Domain\Entities\BaseEntity;

class Document extends BaseEntity
{

    public function __construct(
        public readonly int $id,
        public readonly int $userId,
        public readonly int $typeId,
        public string $value,
        public ?Carbon $createdAt,
        public ?Carbon $updatedAt,
        public ?Carbon $deletedAt,
    ) {
    }


    public static function makeFromArray(array $data): self
    {
        return new self(
            $data['id'],
            $data['user_id'],
            $data['type_id'],
            $data['value'],
            Carbon::parse($data['created_at']),
            Carbon::parse($data['updated_at']),
            empty($data['deleted_at']) ? null : Carbon::parse($data['deleted_at']),
        );
    }
}
