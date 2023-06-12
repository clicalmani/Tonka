<?php
Clicalmani\Flesco\Providers\ServiceProvider::$providers = [
    'users' => [
        'manage' => App\Providers\AuthServiceProvider::class
    ],
    'middleware' => [
        'web' => [
            'authenticate' => App\Http\Middleware\Authenticate::class
        ],
        'api' => [
            'jwtauth' => App\Http\Middleware\Auth::class
        ]
    ],
    'helpers' => [
        // Helpers
    ]
];