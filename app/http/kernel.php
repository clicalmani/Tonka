<?php 
return [

    /**
     * |-------------------------------------------------------------------
     * |                          Web Middlewares
     * |-------------------------------------------------------------------
     * 
     */
    'web' => [
        'authenticator' => App\Http\Middlewares\Authenticate::class,
    ],

    /**
     * |-------------------------------------------------------------------
     * |                        API Middlewares
     * |-------------------------------------------------------------------
     * 
     */
    'api' => [ 
        'api' => App\Http\Middlewares\AuthApi::class,
        'jwtauth' => App\Http\Middlewares\Auth::class
    ]
];
