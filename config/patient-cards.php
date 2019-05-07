<?php

return [

    'validation_rules' => [

        'store' => [
            'master-card' => 'required|exists:master_card,master_card_id',
            'patient' => 'required|exists:patient,patient_id'
        ],

        'get_data' => [
            'consider-version' => 'required',
            'encounter-type' => 'required'
        ]

    ]

];
