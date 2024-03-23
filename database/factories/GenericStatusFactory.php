<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use PicPay\Shared\Infrastructure\Models\GenericStatus;

class GenericStatusFactory extends Factory
{
    protected $model = GenericStatus::class;

    public function definition(): array
    {
        return [
            'name' => fake()->randomElement(['active', 'inactive'])
        ];
    }
}
