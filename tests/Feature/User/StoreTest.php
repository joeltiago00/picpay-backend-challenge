<?php

namespace Tests\Feature\User;

use Illuminate\Support\Facades\Event;
use PicPay\Wallet\Domain\Events\CreateUserWallet;
use Symfony\Component\HttpFoundation\Response;
use Tests\Feature\FeatureTest;
use Tests\Providers\User\StoreProvider;

class StoreTest extends FeatureTest
{
    private const ROUTE = 'users.store';

    /**
     * @group usersStore
     * @dataProvider \Tests\Providers\User\StoreProvider::payloadsSuccessTests
     */
    public function testSuccess(array $payload): void
    {
        Event::fake();

        $response = $this->postJson(route(self::ROUTE, $payload));

        $response->assertStatus(Response::HTTP_CREATED)
            ->assertJson(StoreProvider::responseSuccessExpected($payload));

        Event::assertDispatched(CreateUserWallet::class);

        $responseArray = $response->json();

        $this->assertDatabaseHas('users', [
            'id' => $responseArray['data']['id'],
            'first_name' => $responseArray['data']['first_name'],
            'last_name' => $responseArray['data']['last_name'],
            'email' => $responseArray['data']['email'],
            'type_id' => $responseArray['data']['type_id'],
            'status_id' => $responseArray['data']['status_id']
        ]);

        $this->assertDatabaseHas('user_documents', [
            'user_id' => $responseArray['data']['id'],
            'type_id' => $responseArray['data']['document']['type_id'],
            'value' => $responseArray['data']['document']['value']
        ]);
    }

    /**
     * @group usersStore
     */
    public function testFailCpfExists()
    {
        $payload = StoreProvider::payloadFailCpfExists();

        $response = $this->postJson(route(self::ROUTE, $payload));

        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
            ->assertJson([
                'message' => trans(
                    'exceptions.rules.document-already-exists',
                    ['document' => $payload['document']['value']]
                )
            ]);
    }

    /**
     * @group usersStore
     * @dataProvider \Tests\Providers\User\StoreProvider::payloadsFailInvalidFieldsTests
     */
    public function testFailInvalidFields(array $payload, string $errorMessage): void
    {
        $response = $this->postJson(route(self::ROUTE, $payload));

        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY)
            ->assertJson(['message' => $errorMessage]);
    }
}
