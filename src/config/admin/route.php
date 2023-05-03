<?php

/*
|--------------------------------------------------------------------------
| Admin Web route list
|--------------------------------------------------------------------------
*/
return [
    'view' => 'admin',
    'routes' => [
        [
            'url' => '/login',
            'name' => null,
        ],
        [
            'url' => '/forget-password',
            'name' => null,
        ],
        [
            'url' => '/dashboard',
            'name' => null,
        ],
        [
            'url' => '/profile',
            'name' => null,
        ],
        [
            'url' => '/chat',
            'name' => null,
        ],
        [
            'url' => '/role',
            'name' => null,
        ],
        [
            'url' => '/role/store',
            'name' => null,
        ],
        [
            'url' => '/role/update/{id}',
            'name' => null,
        ],
        [
            'url' => '/role/show/{id}',
            'name' => null,
        ],
        [
            'url' => '/password-reset/{email}/{token}',
            'name' => 'admin.password.reset',
        ]
    ]
];
