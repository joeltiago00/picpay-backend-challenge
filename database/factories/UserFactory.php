<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use PicPay\Shared\Infrastructure\Enums\StatusEnum;
use PicPay\User\Infrastructure\Enums\TypeEnum;
use PicPay\User\Infrastructure\Models\User;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition(): array
    {
        return [
            'first_name' => fake()->firstName(),
            'last_name' => fake()->lastName(),
            'email' => fake()->unique()->safeEmail(),
            'password' => Hash::make('password'),
            'type_id' => fake()->randomElement([TypeEnum::COMMON->value, TypeEnum::SHOP->value]),
            'status_id' => StatusEnum::ACTIVE->value,
            'phone_number' => fake()->phoneNumber()
        ];
    }

}
