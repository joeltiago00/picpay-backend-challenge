<?php

return [
    'rules' => [
        'document-already-exists' => 'Already has some user registered with this document (:document). Please, change document value and try again.',
    ],

    'user' => [
        'not-updated' => 'User not updated. Try again later...',
        'first-name-cannot-be-null' => 'First name cannot be null. Please, change value and try again...',
    ],

    'wallet' => [
        'user-already-has-waller' => 'User cannot create a wallet. Try again or made contact with support.',
    ],

    'message' => [
        'invalid-service' => 'Service :service is not implemented.',
    ],

    'transaction' => [
        'user-not-authorized' => 'You dont have authorization to make a transaction.',
        'user-dont-have-sufficient-amount' => 'You dont have sufficient amount to make this transaction.',
    ]
];
