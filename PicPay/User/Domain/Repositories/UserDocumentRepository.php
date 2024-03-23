<?php

namespace PicPay\User\Domain\Repositories;

use PicPay\User\Domain\Entities\Document;

interface UserDocumentRepository
{
    public function getByValue(string $value): ?Document;
}
