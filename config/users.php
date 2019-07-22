<?php

return [

    'validation_rules' => [

        'store' => [
            'username' => 'required|string|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ],

        'update' => [

        ],

    ]

];
