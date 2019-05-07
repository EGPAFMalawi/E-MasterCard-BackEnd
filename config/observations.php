<?php

return [

    'validation_rules' => [

        'store' => [
            'first_name' => 'required|max:20',
            'last_name' => 'required|max:20',
            'gender' => 'required',
            'email' => 'sometimes|email|max:50|unique:people,email',
            'avatar' => 'sometimes|image',
            'postal_address' => 'sometimes|max:255',
            'physical_address' => 'required|max:255',
            'phone_number1' => 'required|digits:10',
            'phone_number2' => 'sometimes|digits:10',
        ],

        'update' => [
            'first_name' => 'required|max:20',
            'last_name' => 'required|max:20',
            'gender' => 'required',
            'avatar' => 'sometimes|image',
            'postal_address' => 'sometimes|max:255',
            'physical_address' => 'required|max:255',
            'phone_number1' => 'required|digits:10',
            'phone_number2' => 'sometimes|digits:10',
        ],

    ]

];
