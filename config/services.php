<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
        'scheme' => 'https',
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],
    'google' => [
        'client_id' => '790104747568-u7dej32fb85fb8fdoiq6qntps4gncolg.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'https://etalon.uptoo.top/public/googleauth/callback',
    ],
    'facebook' => [
        'client_id' => '1116268169493559',
        'client_secret' => 'ee074b4807844aea79d45dd80b7977a4', //USE FROM FACEBOOK DEVELOPER ACCOUNT
        'redirect' => 'https://etalon.uptoo.top/public/facebook/callback'
    ],

];
