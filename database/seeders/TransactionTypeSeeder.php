<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use PicPay\Transaction\Infrastructure\Enums\TypeEnum as TransactionTypeEnum;
use PicPay\Transaction\Infrastructure\Models\TransactionType;

class TransactionTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TransactionType::query()->create(['name' => TransactionTypeEnum::ENTRY->name]);
        TransactionType::query()->create(['name' => TransactionTypeEnum::TRASNFER->name]);
        TransactionType::query()->create(['name' => TransactionTypeEnum::REFUND->name]);
    }
}
