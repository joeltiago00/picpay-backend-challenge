<?php

namespace PicPay\User\Domain\Entities;

use Illuminate\Support\Carbon;
use PicPay\Shared\Domain\Entities\BaseEntity;

class User extends BaseEntity
{
    public function __construct(
        public readonly int    $id,
        public string  $firstName,
        public string  $lastName,
        public string  $email,
        public string  $password,
        public int     $typeId,
        public int     $statusId,
        public ?Carbon $createdAt,
        public ?Carbon $updatedAt,
        public ?Carbon $deletedAt,
        public ?Document $document = null
    ) {
    }

    public static function makeFromArray(array $data): self
    {
        return new self(
            $data['id'],
            $data['first_name'],
            $data['last_name'] ?? null,
            $data['email'],
            $data['password'],
            $data['type_id'],
            $data['status_id'],
            Carbon::parse($data['created_at']),
            Carbon::parse($data['updated_at']),
            empty($data['deleted_at']) ? null : Carbon::parse($data['deleted_at']),
        );
    }
}
