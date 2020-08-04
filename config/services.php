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
        'client_id' => '953949081611-mmd2mvb0pfhc3ukfmc2gmscn8lkigi23.apps.googleusercontent.com',
        'client_secret' => 'WXP-nO1mayB_NtYiAkGu4LpQ',
        'redirect' => 'http://tweeter.site/login/google/callback',
    ],
    'facebook'=>[
        'client_id' =>'294791935023705',
        'client_secret'=>'20d6cc80b9fe4c4d574e4a799504ef54',
        'redirect'=> 'http://tweeter.site/login/facebook/callback',
    ]

];
