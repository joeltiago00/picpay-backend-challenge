<?php

return [
    // if url is expired need to create another in wire mock api website

    'central-bank' => [
        'base-url' => 'https://9j096.wiremockapi.cloud/',
        'urls' => [
            'check-authorization' => 'authorization/check'
        ]
    ],

    'sms-sender' => [
        'base-url' => 'https://9j096.wiremockapi.cloud/',
        'urls' => [
            'send' => 'sms/send'
        ]
    ],

];
