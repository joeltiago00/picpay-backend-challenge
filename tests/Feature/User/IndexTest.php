<?php

namespace Tests\Feature\User;

use Illuminate\Support\Str;
use Symfony\Component\HttpFoundation\Response;
use Tests\Feature\FeatureTest;
use Tests\Providers\User\IndexProvider;

class IndexTest extends FeatureTest
{
    private const ROUTE = 'users.index';

    public function testSuccess()
    {
        IndexProvider::createUser();

        $response = $this->getJson(route(self::ROUTE));

        $response->assertStatus(Response::HTTP_OK)
            ->assertJsonStructure([
                'data' => [['id', 'first_name', 'last_name', 'email', 'type_id', 'status_id', 'document']]]);
    }

    public function testSuccessWithFilterFirstName()
    {
        $user = IndexProvider::createUser();

        $response = $this->getJson(route(self::ROUTE, ['first_name' => $user->first_name]));

        $response->assertStatus(Response::HTTP_OK)
            ->assertJson(IndexProvider::getPayloadSuccessByUser($user));
    }

    public function testSuccessWithoutResults()
    {
        $response = $this->getJson(route(self::ROUTE, ['first_name' => Str::random()]));

        $response->assertStatus(Response::HTTP_OK)
            ->assertJson(['data' => []]);
    }
}
