<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use PicPay\User\Infrastructure\Enums\DocumentType as DocumentTypeEnum;
use PicPay\User\Infrastructure\Models\DocumentType;

class DocumentTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DocumentType::query()->create(['name' => DocumentTypeEnum::CPF->name]);
        DocumentType::query()->create(['name' => DocumentTypeEnum::CNPJ->name]);
    }
}
