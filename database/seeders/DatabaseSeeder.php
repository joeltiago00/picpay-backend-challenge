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
        // TODO:: Fix this seeder to create all registers
        GenericStatus::factory(4)
            ->sequence(
                ['name' => StatusEnum::ACTIVE->name],
                ['name' => StatusEnum::INACTIVE->name],
                ['name' => StatusEnum::APPROVED->name],
            )->create();

        DocumentType::factory(2)
            ->sequence(
                ['name' => DocumentTypeEnum::CPF->name],
                ['name' => DocumentTypeEnum::CNPJ->name],
            )->create();

        UserType::factory(2)
            ->sequence(
                ['name' => TypeEnum::COMMON->value],
                ['name' => TypeEnum::SHOP->value],
            );

        TransactionType::factory(3)
            ->sequence(
                ['name' => TransactionTypeEnum::ENTRY->name],
                ['name' => TransactionTypeEnum::TRASNFER->name],
                ['name' => TransactionTypeEnum::REFUND->name],
            );
    }
}
