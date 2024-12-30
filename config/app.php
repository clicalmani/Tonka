<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Application Timezone
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default timezone for your application, which
    | will be used by the PHP date and date-time functions. We have gone
    | ahead and set this to a sensible default for you out of the box.
    |
    */

    'timezone' => 'UTC',

    /*
    |---------------------------------------------------------------------------
    | JSON 
    |---------------------------------------------------------------------------
    | 
    | This settings instruct how to encode and decode json string and convert it 
    | into a PHP value.
    */

    'json' => [
        'encode' => [
            'flags' => JSON_UNESCAPED_UNICODE,
            'depth' => 512
        ],
        'decode' => [
            'associative' => true,
            'depth' => 512,
            'flags' => JSON_PRESERVE_ZERO_FRACTION | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES | JSON_NUMERIC_CHECK
        ]
    ],

    /*
    |--------------------------------------------------------------------------
    | Autoloaded Service Providers
    |--------------------------------------------------------------------------
    |
    | The service providers listed here will be automatically loaded on the
    | request to your application. Feel free to add your own services to
    | this array to grant expanded functionality to your applications.
    |
    */

    'providers' => [

        /*
         * Tonka Framework Service Providers...
         */
        Clicalmani\Foundation\Providers\EnvServiceProvider::class,
        Clicalmani\Foundation\Auth\AuthServiceProvider::class,
        Clicalmani\Foundation\Providers\HelpersServiceProvider::class,
        Clicalmani\Foundation\Auth\EncryptionServiceProvider::class,
        Clicalmani\Foundation\Providers\RouteServiceProvider::class,
        Clicalmani\Foundation\Providers\LogServiceProvider::class,
        Clicalmani\Foundation\Providers\ContainerServiceProvider::class,
        Clicalmani\Foundation\Providers\InputValidationServiceProvider::class,
        
        /*
         * Application Service Providers...
         */
        App\Providers\SessionServiceProvider::class,
        App\Providers\AppServiceProvider::class,
        App\Providers\RouteServiceProvider::class,
        App\Providers\EventServiceProvider::class,
        App\Providers\AuthServiceProvider::class,
    ]
];
