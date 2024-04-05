<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use PicPay\Shared\Infrastructure\Enums\StatusEnum;
use PicPay\Shared\Infrastructure\Models\GenericStatus;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        GenericStatus::query()->create(['name' => StatusEnum::ACTIVE->name]);
        GenericStatus::query()->create(['name' => StatusEnum::INACTIVE->name]);
        GenericStatus::query()->create(['name' => StatusEnum::APPROVED->name]);
        GenericStatus::query()->create(['name' => StatusEnum::NOT_APPROVED->name]);
        GenericStatus::query()->create(['name' => StatusEnum::NOT_AUTHORIZED->name]);
    }
}
