<?php

return [

    'validation_rules' => [

        'store' => [
            'age' => 'required|numeric',
            'sex' => 'required|string',
            'status' => 'required|string',
            'modality' => 'required|string',
        ],

        'update' => [
            'age' => 'required|numeric',
            'sex' => 'required|string',
            'status' => 'required|string',
            'modality' => 'required|string',
        ],

    ]

];
