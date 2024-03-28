<?php

namespace Tests\Feature\Wallet;

use PicPay\User\Infrastructure\Models\User;
use PicPay\Wallet\Domain\Events\CreateUserWallet;
use Tests\Feature\FeatureTest;

class CreateUserWalletEventTest extends FeatureTest
{
    public function testSuccess()
    {
        $user = User::factory()->create();

        CreateUserWallet::dispatch($user->toEntity($user));

        $this->assertDatabaseHas('wallets', [
            'user_id' => $user->getKey()
        ]);
    }
}
