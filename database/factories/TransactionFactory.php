<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use PicPay\Shared\Infrastructure\Enums\StatusEnum;
use PicPay\Transaction\Infrastructure\Enums\TypeEnum;
use PicPay\Transaction\Infrastructure\Models\Transaction;
use PicPay\Wallet\Infrastructure\Models\Wallet;

class TransactionFactory extends Factory
{
    protected $model = Transaction::class;

    public function definition(): array
    {
        $typeId = fake()->randomElement([TypeEnum::ENTRY->value, TypeEnum::TRASNFER->value, TypeEnum::REFUND->value]);

        return [
            'payer_wallet_id' => Wallet::factory(),
            'payee_wallet_id' => Wallet::factory(),
            'amount' => fake()->randomNumber(8),
            'status_id' => fake()->randomElement([StatusEnum::APPROVED->value, StatusEnum::NOT_APPROVED->value]),
            'type_id' => $typeId,
            'refound_transaction_id' => $typeId !== TypeEnum::REFUND->value
                ? null
                : Transaction::factory()->create([ 'type_id' => TypeEnum::TRASNFER->value, 'status_id' => StatusEnum::APPROVED->value]),
            'refound_reason' => $typeId !== TypeEnum::REFUND->value
                ? null
                : fake()->text(30)
        ];
    }
}
