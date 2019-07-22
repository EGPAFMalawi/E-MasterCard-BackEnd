<?php

return [

    'validation_rules' => [

        'store' => [
            'age' => 'required|numeric',
            'sex' => 'required|string',
            'status' => 'required|string',
            'modality' => 'required|string',
            'year' => 'required|numeric',
            'month' => 'required|numeric',
            'inserted_hts_record_id' => 'required|unique:hts_record|string',
            'service_delivery_point' => 'required|string',
        ],

        'update' => [
            'age' => 'required|numeric',
            'sex' => 'required|string',
            'status' => 'required|string',
            'modality' => 'required|string',
            'year' => 'required|numeric',
            'month' => 'required|numeric',
            'service_delivery_point' => 'required|string',
        ],

    ]

];
