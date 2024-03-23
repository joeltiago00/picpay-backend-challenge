<?php

namespace PicPay\User\Domain\DTO;

use PicPay\Shared\Domain\DTO\BaseDTO;

class DocumentDTO extends BaseDTO
{
    public function __construct(
        public readonly int $userId,
        public readonly int $typeId,
        public string $value
    ) {
    }
}
