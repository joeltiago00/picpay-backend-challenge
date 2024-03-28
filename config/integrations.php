<?php

return [
    // if url is expired need to create another in wire mock api website
    'base-url' => 'https://6605f218d92166b2e3c307c2.mockapi.io/api/v1//',

    'central-bank' => [

        'urls' => [
            'check-authorization' => 'authorization'
        ]
    ],

    'sms-sender' => [
        'urls' => [
            'send' => 'sms'
        ]
    ],

];
