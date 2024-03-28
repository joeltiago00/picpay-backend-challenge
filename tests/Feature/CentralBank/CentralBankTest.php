<?php

namespace Tests\Feature\CentralBank;

use PicPay\CentralBank\Domain\Facades\CentralBank;
use PicPay\User\Infrastructure\Models\User;
use Tests\Feature\FeatureTest;

class CentralBankTest extends FeatureTest
{
    public function testSuccess()
    {
        $user = User::factory()->create();

        $this->assertTrue(CentralBank::authorization()->check($user->getKey()));
    }
}
