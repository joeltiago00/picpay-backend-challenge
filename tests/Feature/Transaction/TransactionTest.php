<?php

namespace Tests\Feature\Transaction;

use PicPay\Wallet\Infrastructure\Models\Wallet;
use Tests\Feature\FeatureTest;

class TransactionTest extends FeatureTest
{
    private const ROUTE = 'transactions.make';

    /**
     * @group void
     */
    public function testSuccess()
    {
        $payerWallet = Wallet::find(1);
        $payeeWallet = Wallet::find(2);

        $response = $this->postJson(route(self::ROUTE), [
            'payer_wallet_id' => $payerWallet->getKey(),
            'payee_wallet_id' => $payeeWallet->getKey(),
            'amount' => 1000
        ]);

        $response->dd();
    }
}
