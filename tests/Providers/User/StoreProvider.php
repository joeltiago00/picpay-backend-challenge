<?php

namespace Tests\Providers\User;

use PicPay\Shared\Infrastructure\Enums\StatusEnum;
use PicPay\Shared\Infrastructure\Models\GenericStatus;
use PicPay\User\Infrastructure\Enums\DocumentType as DocumentTypeEnum;
use PicPay\User\Infrastructure\Enums\TypeEnum;
use PicPay\User\Infrastructure\Models\DocumentType;
use PicPay\User\Infrastructure\Models\User;
use PicPay\User\Infrastructure\Models\UserDocument;
use PicPay\User\Infrastructure\Models\UserType;

class StoreProvider
{
    public static function successPayload(DocumentTypeEnum $documentType, TypeEnum $userType): array
    {
        return [
            'first_name' => fake()->firstName,
            'last_name' => fake()->lastName,
            'email' => fake()->email,
            'password' => 'password',
            'password_confirmation' => 'password',
            'type_id' => $userType->value,
            'document' => [
                'type_id' => $documentType->value,
                'value' => '12345678910'
            ]
        ];
    }

    public static function responseSuccessExpected(array $payload): array
    {

        return [
            'data' => [
                'first_name' => $payload['first_name'],
                'last_name' => $payload['last_name'],
                'email' => $payload['email'],
                'type_id' => $payload['type_id'],
                'status_id' => StatusEnum::ACTIVE->value,
                'document' => [
                    'type_id' => $payload['document']['type_id'],
                    'value' => $payload['document']['value']
                ]
            ]
        ];
    }

    public static function payloadsSuccessTests(): array
    {
        return [
            'common user with cpf' => [self::successPayload(DocumentTypeEnum::CPF, TypeEnum::COMMON)],
            'shop user with cnpj' => [self::successPayload(DocumentTypeEnum::CNPJ, TypeEnum::SHOP)]
        ];
    }

    public static function payloadFailCpfExists(): array
    {
        $cpf = '12345678910';

        User::factory()->create()
            ->setRelation('document', UserDocument::factory()->create(['value' => $cpf]));

        return [
            'first_name' => fake()->firstName,
            'last_name' => fake()->lastName,
            'email' => fake()->email,
            'password' => 'password',
            'password_confirmation' => 'password',
            'type_id' => TypeEnum::COMMON->value,
            'document' => [
                'type_id' => DocumentTypeEnum::CPF->value,
                'value' => $cpf
            ]
        ];
    }

    public static function payloadsFailInvalidFieldsTests(): array
    {
        return [
            'invalid first name' => [
                [
                    'first_name' => 'a',
                    'last_name' => 'bbb',
                    'email' => fake()->email,
                    'password' => 'password',
                    'password_confirmation' => 'password',
                    'type_id' => TypeEnum::COMMON->value,
                    'document' => [
                        'type_id' => DocumentTypeEnum::CPF->value,
                        'value' => '12345678911'
                    ]
                ],
                'The first name field must be at least 3 characters.'
            ],
            'invalid last name' => [
                [
                    'first_name' => 'aaa',
                    'last_name' => 'b',
                    'email' => fake()->email,
                    'password' => 'password',
                    'password_confirmation' => 'password',
                    'type_id' => TypeEnum::COMMON->value,
                    'document' => [
                        'type_id' => DocumentTypeEnum::CPF->value,
                        'value' => '12345678911'
                    ]
                ],
                'The last name field must be at least 3 characters.'
            ],
            'invalid email' => [
                [
                    'first_name' => 'ass',
                    'last_name' => 'baaa',
                    'email' => 'c',
                    'password' => 'password',
                    'password_confirmation' => 'password',
                    'type_id' => TypeEnum::COMMON->value,
                    'document' => [
                        'type_id' => DocumentTypeEnum::CPF->value,
                        'value' => '12345678911'
                    ]
                ],
                'The email field must be a valid email address.'
            ],
            'invalid password' => [
                [
                    'first_name' => 'ass',
                    'last_name' => 'baaa',
                    'email' => fake()->unique()->safeEmail(),
                    'password' => 'pwd',
                    'password_confirmation' => 'pwd',
                    'type_id' => TypeEnum::COMMON->value,
                    'document' => [
                        'type_id' => DocumentTypeEnum::CPF->value,
                        'value' => '12345678911'
                    ]
                ],
                'The password field must be at least 8 characters.'
            ],
            'invalid user type' => [
                [
                    'first_name' => 'ass',
                    'last_name' => 'baaa',
                    'email' => fake()->unique()->safeEmail(),
                    'password' => 'password',
                    'password_confirmation' => 'password',
                    'type_id' => 9999,
                    'document' => [
                        'type_id' => DocumentTypeEnum::CPF->value,
                        'value' => '12345678911'
                    ]
                ],
                'The selected type id is invalid.'
            ],
            'invalid document type' => [
                [
                    'first_name' => 'ass',
                    'last_name' => 'baaa',
                    'email' => fake()->unique()->safeEmail(),
                    'password' => 'password',
                    'password_confirmation' => 'password',
                    'type_id' => TypeEnum::COMMON->value,
                    'document' => [
                        'type_id' => 9999,
                        'value' => '12345678911'
                    ]
                ],
                'The selected document.type id is invalid.'
            ],
            'invalid document value' => [
                [
                    'first_name' => 'ass',
                    'last_name' => 'baaa',
                    'email' => fake()->unique()->safeEmail(),
                    'password' => 'password',
                    'password_confirmation' => 'password',
                    'type_id' => TypeEnum::COMMON->value,
                    'document' => [
                        'type_id' => DocumentTypeEnum::CPF->value,
                        'value' => '123456789'
                    ]
                ],
                'The document.value field must be at least 11 characters.'
            ]
        ];
    }
}
