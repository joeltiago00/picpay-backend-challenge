<?php

namespace Tests\Providers\User;

class UpdateProvider
{
    public static function payloadSuccessFirstAndLastName(): array
    {
        $firstName = 'upd';
        $lastName = 'ated';

        $payload = [
            'first_name' => $firstName,
            'last_name' => $lastName
        ];

        return [$payload, $firstName, $lastName];
    }

    public static function payloadSuccessOnlyFirstName(): array
    {
        $firstName = 'upd';

        $payload = [
            'first_name' => $firstName,
        ];

        return [$payload, $firstName];
    }

    public static function payloadSuccessOnlyLastName(): array
    {
        $lastName = 'ated';

        $payload = [
            'last_name' => $lastName
        ];

        return [$payload, $lastName];
    }

    public static function payloadFailWithFirstNameNull(): array
    {
        return [
            'first_name' => '',
        ];

    }
}
