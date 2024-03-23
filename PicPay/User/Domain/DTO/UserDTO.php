<?php

namespace PicPay\User\Domain\DTO;

use Illuminate\Support\Carbon;
use PicPay\Shared\Domain\DTO\BaseDTO;
use PicPay\Shared\Infrastructure\Traits\ToArray;

class UserDTO extends BaseDTO
{
    public function __construct(
        public string  $firstName,
        public string  $lastName,
        public string  $email,
        public string  $password,
        public int     $typeId,
        public int     $statusId,
    ) {
    }
}
