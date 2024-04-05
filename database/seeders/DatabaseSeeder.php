<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use PicPay\Shared\Infrastructure\Enums\StatusEnum;
use PicPay\Shared\Infrastructure\Models\GenericStatus;
use PicPay\Transaction\Infrastructure\Enums\TypeEnum as TransactionTypeEnum;
use PicPay\Transaction\Infrastructure\Models\TransactionType;
use PicPay\User\Infrastructure\Enums\DocumentType as DocumentTypeEnum;
use PicPay\User\Infrastructure\Enums\TypeEnum;
use PicPay\User\Infrastructure\Models\DocumentType;
use PicPay\User\Infrastructure\Models\UserType;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            StatusSeeder::class,
            DocumentTypeSeeder::class,
            TransactionTypeSeeder::class,
            UserTypeSeeder::class
        ]);
    }
}
