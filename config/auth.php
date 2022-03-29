<?php

return [

    'defaults' => [
        'guard' => 'web',
        'passwords' => 'members',
    ],

    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'members',
        ],

        'api' => [
            'driver' => 'token',
            'provider' => 'members',
            'hash' => false,
        ],
    ],

    'providers' => [
        'members' => [
            'driver' => 'eloquent',
            'model' => App\Member::class,
        ],

        // 'users' => [
        //     'driver' => 'database',
        //     'table' => 'users',
        // ],
    ],

    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
        'members' => [
            'provider' => 'members',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],

    'password_timeout' => 10800,

];
