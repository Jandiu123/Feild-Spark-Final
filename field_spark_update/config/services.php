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

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],

    'resend' => [
        'key' => env('RESEND_KEY'),
    ],

    'slack' => [
        'notifications' => [
            'bot_user_oauth_token' => env('SLACK_BOT_USER_OAUTH_TOKEN'),
            'channel' => env('SLACK_BOT_USER_DEFAULT_CHANNEL'),
        ],
    ],
    'twilio' => [
        'sid' => env('TWILIO_SID'),
        'token' => env('TWILIO_TOKEN'),
        'from' => env('TWILIO_FROM'),
    ],
    'notify' => [
        'api_key' => env('NOTIFY_API_KEY'),
        'api_secret' => env('NOTIFY_API_SECRET'),
        'from' => env('NOTIFY_FROM'),
    ],

    'vonage' => [
    'api_key' => env('VONAGE_API_KEY'),
    'api_secret' => env('VONAGE_API_SECRET'),
    'from' => env('VONAGE_FROM'), // Your Vonage number or sender ID
    ],
    
    'textlocal' => [
    'api_key' => env('TEXTLOCAL_API_KEY'),
    'sender' => env('TEXTLOCAL_SENDER'),
],

];
