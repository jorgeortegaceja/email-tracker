<?php

return [


    /*
    |--------------------------------------------------------------------------
    | Default routing
    |--------------------------------------------------------------------------
    |
    |  This option controls the group of routes created for the system dashboard
    |  and also the routes for tracking emails
    |
    */
     "routing" => [
         'prefix' => '',
         'middlewares' => ['web']
    ],

    /*
    |--------------------------------------------------------------------------
    | Default database
    |--------------------------------------------------------------------------
    |
    | This option controls which database for migrations.
    | You can specify the connection,
    | by default it will use mysql
    |
    */

    "connection" => env('DB_CONNECTION', 'mysql'),

    /*
    |--------------------------------------------------------------------------
    | Default storage disk
    |--------------------------------------------------------------------------
    |
    | This option configure in which folder saves the views of the
    | emails you upload, by default they will be loaded in the path:
    | storage/app/
    |
    */

    "disk" => env('FILESYSTEM_DRIVER', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Mailer account
    |--------------------------------------------------------------------------
    |
    | this account is the one that will be used to send,
    | you can add more settings to send
    |
    */

    "mailer_acount" =>  env('MAILER_ACOUNT', "default"),

    /*
    |--------------------------------------------------------------------------
    | Mailer accounts
    |--------------------------------------------------------------------------
    |
    | You can configure your email accounts with which the shipments are plowed.
    | You can specify if you use a specific account when sending.
    | By default the account you have configured
    | with laravel will be used
    |
    */

    "mailers_acounts" => [
        'default' => [
                'transport' => 'smtp',
                'host' => env('MAIL_HOST', 'smtp.mailgun.org'),
                'port' => env('MAIL_PORT', 587),
                'encryption' => env('MAIL_ENCRYPTION', 'tls'),
                'username' => env('MAIL_USERNAME'),
                'password' => env('MAIL_PASSWORD'),
                'timeout' => null,
                'auth_mode' => null
        ],
    ]
];
