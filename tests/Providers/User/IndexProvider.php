<?php

namespace Tests\Providers\User;

use PicPay\User\Infrastructure\Enums\DocumentType;
use PicPay\User\Infrastructure\Models\User;
use PicPay\User\Infrastructure\Models\UserDocument;

class IndexProvider
{
    public static function createUser(): User
    {
        $user = User::factory()->create();

        $user->setRelation('document', UserDocument::factory()->create(['user_id' => $user->getKey()]));

        return $user;
    }

    public static function getPayloadSuccessByUser(User $user): array
    {
        return [
            'data' => [
                [
                    'id' => $user->id,
                    'first_name' => $user->first_name,
                    'last_name' => $user->last_name,
                    'email' => $user->email,
                    'type_id' => $user->type_id,
                    'status_id' => $user->status_id,
                    'document' => [
                        'id' => $user->document->id,
                        'type_id' => $user->document->type_id,
                        'type_name' => DocumentType::tryFrom($user->document->type_id),
                        'value' => $user->document->value
                    ]
                ]
            ]
        ];
    }
}
