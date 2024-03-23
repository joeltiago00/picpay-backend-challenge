<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use PicPay\User\Infrastructure\Enums\DocumentType as DocumentTypeEnum;
use PicPay\User\Infrastructure\Models\DocumentType;

class DocumentTypeFactory extends Factory
{
    protected $model = DocumentType::class;

    public function definition(): array
    {
        return [
            'name' => fake()->randomElement([DocumentTypeEnum::CPF->name, DocumentTypeEnum::CNPJ->name])
        ];
    }
}
