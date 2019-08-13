<?php

return [

    'validation_rules' => [

        'store' => [
            'identifier' => 'required|numeric|unique:patient_identifier',
            'patient' => 'required|numeric|exists:patient,patient_id|unique:patient_identifier,patient_id',
        ],

        'update' => [
            'identifier' => 'required|numeric|unique:patient_identifier',
        ],

    ]

];
