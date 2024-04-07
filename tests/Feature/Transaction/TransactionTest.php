<?php

namespace Tests\Feature\Transaction;

use Illuminate\Support\Facades\Http;
use PicPay\Shared\Infrastructure\Enums\StatusEnum;
use PicPay\Transaction\Infrastructure\Enums\TypeEnum as TransactionTypeEnum;
use PicPay\Transaction\Infrastructure\Models\Transaction;
use PicPay\User\Infrastructure\Enums\TypeEnum;
use PicPay\User\Infrastructure\Models\User;
use PicPay\Wallet\Infrastructure\Models\Wallet;
use Symfony\Component\HttpFoundation\Response;
use Tests\Feature\FeatureTest;

class TransactionTest extends FeatureTest
{
    private const ROUTE = 'transactions.make';

    /**
     * @group void
     */
    public function testSuccess()
    {
        $payerWallet = User::factory()->create(['type_id' => TypeEnum::COMMON->value])->wallet()->create();
        $payeeWallet = Wallet::factory()->create();

        // add amount into account
        Transaction::factory()->create([
            'payer_wallet_id' => $payerWallet->getKey(),
            'payee_wallet_id' => $payerWallet->getKey(),
            'amount' => 10000,
            'status_id' => StatusEnum::APPROVED->value,
            'type_id' => TransactionTypeEnum::ENTRY->value,
            'transaction_refund_id' => null,
            'refund_reason' => null
        ]);

        $response = $this->postJson(route(self::ROUTE), [
            'payer_wallet_id' => $payerWallet->getKey(),
            'payee_wallet_id' => $payeeWallet->getKey(),
            'amount' => 100
        ]);

        $response->assertStatus(Response::HTTP_NO_CONTENT);

        $this->assertDatabaseHas('transactions', [
            'payer_wallet_id' => $payerWallet->getKey(),
            'payee_wallet_id' => $payeeWallet->getKey(),
            'amount' => 100,
            'status_id' => StatusEnum::APPROVED->value,
            'type_id' => TransactionTypeEnum::TRASNFER->value,
        ]);
    }

    public function testFailWithoutSufficientAmountInPayerWallet()
    {
        $payerWallet = User::factory()->create(['type_id' => TypeEnum::COMMON->value])->wallet()->create();
        $payeeWallet = Wallet::factory()->create();

        $response = $this->postJson(route(self::ROUTE), [
            'payer_wallet_id' => $payerWallet->getKey(),
            'payee_wallet_id' => $payeeWallet->getKey(),
            'amount' => 100
        ]);

        $response->assertStatus(Response::HTTP_FORBIDDEN)
            ->assertJson(['message' => trans('exceptions.transaction.user-dont-have-sufficient-amount')]);
    }

    public function testFailWithoutAuthorization()
    {
        Http::fake([
            sprintf('%s%s',
                config('integrations.base-url'),
                config('integrations.central-bank.urls.check-authorization')
            ) => Http::response([], Response::HTTP_FORBIDDEN)
        ]);

        $payerWallet = User::factory()->create(['type_id' => TypeEnum::COMMON->value])->wallet()->create();
        $payeeWallet = Wallet::factory()->create();

        // add amount into account
        Transaction::factory()->create([
            'payer_wallet_id' => $payerWallet->getKey(),
            'payee_wallet_id' => $payerWallet->getKey(),
            'amount' => 10000,
            'status_id' => StatusEnum::APPROVED->value,
            'type_id' => TransactionTypeEnum::ENTRY->value,
            'transaction_refund_id' => null,
            'refund_reason' => null
        ]);

        $response = $this->postJson(route(self::ROUTE), [
            'payer_wallet_id' => $payerWallet->getKey(),
            'payee_wallet_id' => $payeeWallet->getKey(),
            'amount' => 100
        ]);

        $response->assertStatus(Response::HTTP_FORBIDDEN)
            ->assertJson(['message' => trans('exceptions.transaction.user-not-authorized')]);
    }

    public function testFailInvalidUserType()
    {
        $payerWallet = User::factory()->create(['type_id' => TypeEnum::SHOP->value])->wallet()->create();
        $payeeWallet = Wallet::factory()->create();

        $response = $this->postJson(route(self::ROUTE), [
            'payer_wallet_id' => $payerWallet->getKey(),
            'payee_wallet_id' => $payeeWallet->getKey(),
            'amount' => 100
        ]);

        $response->assertStatus(Response::HTTP_FORBIDDEN)
            ->assertJson(['message' => trans('exceptions.transaction.user-not-authorized')]);
    }
}
