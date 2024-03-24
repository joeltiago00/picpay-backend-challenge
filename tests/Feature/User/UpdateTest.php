<?php

namespace Tests\Feature\User;

use PicPay\User\Infrastructure\Models\User;
use Symfony\Component\HttpFoundation\Response;
use Tests\Feature\FeatureTest;
use Tests\Providers\User\UpdateProvider;

class UpdateTest extends FeatureTest
{
    private const ROUTE = 'users.update';

    public function testSuccess()
    {
        $user = User::factory()->create();

        [$payload, $firstName, $lastName] = UpdateProvider::payloadSuccessFirstAndLastName();

        $response = $this->patchJson(route(self::ROUTE, ['userId' => $user->getKey()]), $payload);

        $response->assertStatus(Response::HTTP_NO_CONTENT);

        $this->assertDatabaseHas('users', [
            'id' => $user->getKey(),
            'first_name' => $firstName,
            'last_name' => $lastName
        ]);
    }

    public function testSuccessOnlyFirstName()
    {
        $user = User::factory()->create();

        [$payload, $firstName] = UpdateProvider::payloadSuccessOnlyFirstName();

        $response = $this->patchJson(route(self::ROUTE, ['userId' => $user->getKey()]), $payload);

        $response->assertStatus(Response::HTTP_NO_CONTENT);

        $this->assertDatabaseHas('users', [
            'id' => $user->getKey(),
            'first_name' => $firstName,
        ]);
    }

    public function testSuccessOnlyLastName()
    {
        $user = User::factory()->create();

        [$payload, $lastName] = UpdateProvider::payloadSuccessOnlyLastName();

        $response = $this->patchJson(route(self::ROUTE, ['userId' => $user->getKey()]), $payload);

        $response->assertStatus(Response::HTTP_NO_CONTENT);

        $this->assertDatabaseHas('users', [
            'id' => $user->getKey(),
            'last_name' => $lastName
        ]);
    }

    public function testFailFirstNameNull()
    {
        $user = User::factory()->create();

        $response = $this->patchJson(route(self::ROUTE, ['userId' => $user->getKey()]), UpdateProvider::payloadFailWithFirstNameNull());

        $response->assertStatus(Response::HTTP_BAD_REQUEST)
            ->assertJson(['message' => trans('exceptions.user.first-name-cannot-be-null')]);
    }
}
