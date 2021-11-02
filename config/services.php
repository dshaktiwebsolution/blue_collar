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
        'client_id' => '876888259878-6a42p9b6dugrjjoi4215059pmsgd5rkq.apps.googleusercontent.com',
        'client_secret' => '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',
        'redirect' => 'http://localhost/blue_collar/auth/google/callback',
    ],
    'facebook' => [
        'client_id' => '4668243989899263',
        'client_secret' => '4741a6ead117e01d341844834a6d13fd',
        'redirect' => 'http://localhost/blue_collar/auth/facebook/callback',
    ],
    'linkedin' => [
        'client_id' => '780fvjaq5v61vp',
        'client_secret' => 'ipm3wW8th8LjSdFV',
        'redirect' => 'http://localhost/blue_collar/auth/linkedin/callback'
    ],

];
