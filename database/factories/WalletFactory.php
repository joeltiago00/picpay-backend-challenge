<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use PicPay\User\Infrastructure\Models\User;
use PicPay\Wallet\Infrastructure\Models\Wallet;

class WalletFactory extends Factory
{
    protected $model = Wallet::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory()
        ];
    }
}
