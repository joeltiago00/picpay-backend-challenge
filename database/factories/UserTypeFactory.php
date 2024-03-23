<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use PicPay\User\Infrastructure\Enums\TypeEnum;
use PicPay\User\Infrastructure\Models\UserType;

class UserTypeFactory extends Factory
{
    protected $model = UserType::class;

    public function definition(): array
    {
        return [
            'name' => fake()->randomElement([TypeEnum::COMMON->name, TypeEnum::SHOP->name])
        ];
    }
}
