<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use PicPay\User\Infrastructure\Models\DocumentType;
use PicPay\User\Infrastructure\Models\User;
use PicPay\User\Infrastructure\Models\UserDocument;

class UserDocumentFactory extends Factory
{

    protected $model = UserDocument::class;

    public function definition(): array
    {
        return [
            'user_id' => User::factory(),
            'type_id' => DocumentType::factory(),
            'value' => fake()->randomNumber(16)
        ];
    }
}
