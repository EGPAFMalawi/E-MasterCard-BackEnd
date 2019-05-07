<?php

return [

    'validation_rules' => [

        'store' => [
            'art_number' => 'required|string',
            'date' => 'sometimes|date',
            'step' => 'required',
            'site' => 'sometimes|nullable|string',
            'origin_destination' => 'sometimes|nullable',
            'patient' => 'required|exists:patient,patient_id'
        ],

        'update' => [

        ],

    ]

];
