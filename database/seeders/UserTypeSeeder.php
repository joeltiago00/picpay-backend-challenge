<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use PicPay\User\Infrastructure\Enums\TypeEnum;
use PicPay\User\Infrastructure\Models\UserType;

class UserTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        UserType::query()->create(['name' => TypeEnum::COMMON->value]);
        UserType::query()->create(['name' => TypeEnum::SHOP->value]);
    }
}
