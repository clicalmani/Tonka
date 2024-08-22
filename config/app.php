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
    |--------------------------------------------------------------------------
    | Application Locale Configuration
    |--------------------------------------------------------------------------
    |
    | The application locale determines the default locale that will be used
    | by the translation service provider. You are free to set this value
    | to any of the locales which will be supported by the application.
    |
    */

    'locale' => 'en',

    /*
    |--------------------------------------------------------------------------
    | Application Fallback Locale
    |--------------------------------------------------------------------------
    |
    | The fallback locale determines the locale to use when the current one
    | is not available. You may change the value to correspond to any of
    | the language folders that are provided through your application.
    |
    */

    'fallback_locale' => 'en',

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
        Clicalmani\Fundation\Providers\EnvServiceProvider::class,
        Clicalmani\Fundation\Auth\AuthServiceProvider::class,
        Clicalmani\Fundation\Providers\HelpersServiceProvider::class,
        Clicalmani\Fundation\Auth\EncryptionServiceProvider::class,
        Clicalmani\Fundation\Providers\RouteServiceProvider::class,
        Clicalmani\Fundation\Providers\LogServiceProvider::class,
        Clicalmani\Fundation\Providers\ContainerServiceProvider::class,
        Clicalmani\Fundation\Providers\InputValidationServiceProvider::class,
        
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
