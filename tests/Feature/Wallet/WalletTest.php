<?php

namespace Tests\Feature\Wallet;

use Exception;
use PicPay\User\Infrastructure\Models\User;
use PicPay\Wallet\Application\Store;
use PicPay\Wallet\Infrastructure\Models\Wallet;
use Tests\Feature\FeatureTest;

class WalletTest extends FeatureTest
{
    public function testSuccess()
    {
        $user = User::factory()->create();

        $action = app(Store::class);

        $action->handle($user->getKey());

        $this->assertDatabaseHas('wallets', [
            'user_id' => $user->getKey()
        ]);
    }

    public function testFailUserAlreadyHasWallet()
    {
        $this->expectException(Exception::class);

        $user = User::factory()->create();
        Wallet::factory()->create(['user_id' => $user->getKey()]);

        $action = app(Store::class);

        $action->handle($user->getKey());
    }
}
