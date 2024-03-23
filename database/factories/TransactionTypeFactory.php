<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use PicPay\Transaction\Infrastructure\Enums\TypeEnum;
use PicPay\Transaction\Infrastructure\Models\TransactionType;

class TransactionTypeFactory extends Factory
{

    protected $model = TransactionType::class;

    public function definition(): array
    {
        return [
            'name' => fake()->randomElement([TypeEnum::ENTRY->name, TypeEnum::TRASNFER->name, TypeEnum::REFOUND->name])
        ];
    }
}
