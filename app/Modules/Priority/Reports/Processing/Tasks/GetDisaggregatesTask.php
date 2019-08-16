<?php

namespace App\Modules\Priority\Reports\Processing\Tasks;

class GetDisaggregatesTask
{
    public function run($eventQuery, $parsedReportDate)
    {
        $payload = [
            'total' =>  $this->copyQuery($eventQuery)->count(),
            'adults' => [
                'count' => $this->copyQuery($eventQuery)->whereDate('birthdate','<=',$parsedReportDate->subYears(15))->count(),
                'males' => [
                    'count' => $this->copyQuery($eventQuery)->where('birthdate','<=',$parsedReportDate->subYears(15))->where('gender','M')->count(),
                    'disaggregatedByAge' => [
                        '15-19' => $this->copyQuery($eventQuery)->whereBetween('birthdate', [$parsedReportDate->subYears(19), $parsedReportDate->subYears(15)])->where('gender','M')->count(),
                        '20-24' => $this->copyQuery($eventQuery)->whereBetween('birthdate', [$parsedReportDate->subYears(24), $parsedReportDate->subYears(20)])->where('gender','M')->count(),
                        '25-29' => $this->copyQuery($eventQuery)->whereBetween('birthdate', [$parsedReportDate->subYears(29), $parsedReportDate->subYears(25)])->where('gender','M')->count(),
                        '30-34' => $this->copyQuery($eventQuery)->whereBetween('birthdate', [$parsedReportDate->subYears(34), $parsedReportDate->subYears(30)])->where('gender','M')->count(),
                        '35-39' => $this->copyQuery($eventQuery)->whereBetween('birthdate', [$parsedReportDate->subYears(39), $parsedReportDate->subYears(35)])->where('gender','M')->count(),
                        '40-44' => $this->copyQuery($eventQuery)->whereBetween('birthdate', [$parsedReportDate->subYears(44), $parsedReportDate->subYears(40)])->where('gender','M')->count(),
                        '45-49' => $this->copyQuery($eventQuery)->whereBetween('birthdate', [$parsedReportDate->subYears(49), $parsedReportDate->subYears(45)])->where('gender','M')->count(),
                        '50+' => $this->copyQuery($eventQuery)->whereDate('birthdate', '<=', $parsedReportDate->subYears(50))->where('gender','M')->count(),
                    ]
                ],
                'females' => [
                    'count' => $this->copyQuery($eventQuery)->where('birthdate','<=',$parsedReportDate->subYears(15))->where('gender','F')->count(),
                    'disaggregatedByAge' => [
                        '15-19' => $this->copyQuery($eventQuery)->whereBetween('birthdate', [$parsedReportDate->subYears(19), $parsedReportDate->subYears(15)])->where('gender','F')->count(),
                        '20-24' => $this->copyQuery($eventQuery)->whereBetween('birthdate', [$parsedReportDate->subYears(24), $parsedReportDate->subYears(20)])->where('gender','F')->count(),
                        '25-29' => $this->copyQuery($eventQuery)->whereBetween('birthdate', [$parsedReportDate->subYears(29), $parsedReportDate->subYears(25)])->where('gender','F')->count(),
                        '30-34' => $this->copyQuery($eventQuery)->whereBetween('birthdate', [$parsedReportDate->subYears(34), $parsedReportDate->subYears(30)])->where('gender','F')->count(),
                        '35-39' => $this->copyQuery($eventQuery)->whereBetween('birthdate', [$parsedReportDate->subYears(39), $parsedReportDate->subYears(35)])->where('gender','F')->count(),
                        '40-44' => $this->copyQuery($eventQuery)->whereBetween('birthdate', [$parsedReportDate->subYears(44), $parsedReportDate->subYears(40)])->where('gender','F')->count(),
                        '45-49' => $this->copyQuery($eventQuery)->whereBetween('birthdate', [$parsedReportDate->subYears(49), $parsedReportDate->subYears(45)])->where('gender','F')->count(),
                        '50+' => $this->copyQuery($eventQuery)->whereDate('birthdate', '<=', $parsedReportDate->subYears(50))->where('gender','F')->count(),
                    ]
                ]
            ],
            'pediatrics' => [
                'count' => $this->copyQuery($eventQuery)->whereDate('birthdate','>',$parsedReportDate->subYears(15))->count(),
                'males' => [
                    'count' => $this->copyQuery($eventQuery)->where('birthdate','>',$parsedReportDate->subYears(15))->where('gender','M')->count(),
                    'disaggregatedByAge' => [
                        '<1' => $this->copyQuery($eventQuery)->whereDate('birthdate', '>', $parsedReportDate->subYears(1))->where('gender','M')->count(),
                        '1-4' => $this->copyQuery($eventQuery)->whereBetween('birthdate', [$parsedReportDate->subYears(4), $parsedReportDate->subYears(1)])->where('gender','M')->count(),
                        '5-9' => $this->copyQuery($eventQuery)->whereBetween('birthdate', [$parsedReportDate->subYears(9), $parsedReportDate->subYears(5)])->where('gender','M')->count(),
                        '10-14' => $this->copyQuery($eventQuery)->whereBetween('birthdate', [$parsedReportDate->subYears(14), $parsedReportDate->subYears(10)])->where('gender','M')->count()
                    ]
                ],
                'females' => [
                    'count' => $this->copyQuery($eventQuery)->where('birthdate','<',$parsedReportDate->subYears(15))->where('gender','F')->count(),
                    'disaggregatedByAge' => [
                        '<1' => $this->copyQuery($eventQuery)->whereDate('birthdate', '>', $parsedReportDate->subYears(1))->where('gender','F')->count(),
                        '1-4' => $this->copyQuery($eventQuery)->whereBetween('birthdate', [$parsedReportDate->subYears(4), $parsedReportDate->subYears(1)])->where('gender','F')->count(),
                        '5-9' => $this->copyQuery($eventQuery)->whereBetween('birthdate', [$parsedReportDate->subYears(9), $parsedReportDate->subYears(5)])->where('gender','F')->count(),
                        '10-14' => $this->copyQuery($eventQuery)->whereBetween('birthdate', [$parsedReportDate->subYears(14), $parsedReportDate->subYears(10)])->where('gender','F')->count()
                    ]
                ]
            ],
            'unknownAge' => [
                'count' => $this->copyQuery($eventQuery)->whereNull('birthdate')->count(),
                'males' =>  $this->copyQuery($eventQuery)->whereNull('birthdate')->where('gender','M')->count(),
                'females' => $this->copyQuery($eventQuery)->whereNull('birthdate')->where('gender','F')->count()
            ]
        ];

        return $payload;
    }

    public function run2($eventQuery, $parsedReportDate, $type)
    {
        if ($type == 'NewEnrollments') {
            $payload = [
                'total' => $this->copyQuery($eventQuery)->count(),
                'adults' => [
                    'count' => $this->copyQuery($eventQuery)->where('registration_age_at_initiation', '>=', 15)->count(),
                    'males' => [
                        'count' => $this->copyQuery($eventQuery)->where('registration_age_at_initiation', '>=', 15)->where('gender', 'M')->count(),
                        'disaggregatedByAge' => [
                            '15-19' => $this->copyQuery($eventQuery)->whereBetween('registration_age_at_initiation', [15, 19])->where('gender', 'M')->count(),
                            '20-24' => $this->copyQuery($eventQuery)->whereBetween('registration_age_at_initiation', [20, 24])->where('gender', 'M')->count(),
                            '25-29' => $this->copyQuery($eventQuery)->whereBetween('registration_age_at_initiation', [25, 29])->where('gender', 'M')->count(),
                            '30-34' => $this->copyQuery($eventQuery)->whereBetween('registration_age_at_initiation', [30, 34])->where('gender', 'M')->count(),
                            '35-39' => $this->copyQuery($eventQuery)->whereBetween('registration_age_at_initiation', [35, 39])->where('gender', 'M')->count(),
                            '40-44' => $this->copyQuery($eventQuery)->whereBetween('registration_age_at_initiation', [40, 44])->where('gender', 'M')->count(),
                            '45-49' => $this->copyQuery($eventQuery)->whereBetween('registration_age_at_initiation', [45, 49])->where('gender', 'M')->count(),
                            '50+' => $this->copyQuery($eventQuery)->where('registration_age_at_initiation', '>=', 50)->where('gender', 'M')->count(),
                        ]
                    ],
                    'females' => [
                        'count' => $this->copyQuery($eventQuery)->where('registration_age_at_initiation', '>=', 15)->where('gender', 'F')->count(),
                        'disaggregatedByAge' => [
                            '15-19' => $this->copyQuery($eventQuery)->whereBetween('registration_age_at_initiation', [15, 19])->where('gender', 'F')->count(),
                            '20-24' => $this->copyQuery($eventQuery)->whereBetween('registration_age_at_initiation', [20, 24])->where('gender', 'F')->count(),
                            '25-29' => $this->copyQuery($eventQuery)->whereBetween('registration_age_at_initiation', [25, 29])->where('gender', 'F')->count(),
                            '30-34' => $this->copyQuery($eventQuery)->whereBetween('registration_age_at_initiation', [30, 34])->where('gender', 'F')->count(),
                            '35-39' => $this->copyQuery($eventQuery)->whereBetween('registration_age_at_initiation', [35, 39])->where('gender', 'F')->count(),
                            '40-44' => $this->copyQuery($eventQuery)->whereBetween('registration_age_at_initiation', [40, 44])->where('gender', 'F')->count(),
                            '45-49' => $this->copyQuery($eventQuery)->whereBetween('registration_age_at_initiation', [45, 49])->where('gender', 'F')->count(),
                            '50+' => $this->copyQuery($eventQuery)->where('registration_age_at_initiation', '>=', 15)->where('gender', 'F')->count(),
                        ]
                    ]
                ],
                'pediatrics' => [
                    'count' => $this->copyQuery($eventQuery)->where('registration_age_at_initiation', '<', 15)->count(),
                    'males' => [
                        'count' => $this->copyQuery($eventQuery)->where('registration_age_at_initiation', '<', 15)->where('gender', 'M')->count(),
                        'disaggregatedByAge' => [
                            '<1' => $this->copyQuery($eventQuery)->where('registration_age_at_initiation', '<', 1)->where('gender', 'M')->count(),
                            '1-4' => $this->copyQuery($eventQuery)->whereBetween('registration_age_at_initiation', [1,4])->where('gender', 'M')->count(),
                            '5-9' => $this->copyQuery($eventQuery)->whereBetween('registration_age_at_initiation', [5,9])->where('gender', 'M')->count(),
                            '10-14' => $this->copyQuery($eventQuery)->whereBetween('registration_age_at_initiation', [10,14])->where('gender', 'M')->count()
                        ]
                    ],
                    'females' => [
                        'count' => $this->copyQuery($eventQuery)->where('registration_age_at_initiation', '<', 15)->where('gender', 'F')->count(),
                        'disaggregatedByAge' => [
                            '<1' => $this->copyQuery($eventQuery)->where('registration_age_at_initiation', '<', 1)->where('gender', 'F')->count(),
                            '1-4' => $this->copyQuery($eventQuery)->whereBetween('registration_age_at_initiation', [1,4])->where('gender', 'F')->count(),
                            '5-9' => $this->copyQuery($eventQuery)->whereBetween('registration_age_at_initiation', [5,9])->where('gender', 'F')->count(),
                            '10-14' => $this->copyQuery($eventQuery)->whereBetween('registration_age_at_initiation', [10,14])->where('gender', 'F')->count()
                        ]
                    ]
                ],
                'unknownAge' => [
                    'count' => $this->copyQuery($eventQuery)->whereNull('registration_age_at_initiation')->count(),
                    'males' => $this->copyQuery($eventQuery)->whereNull('registration_age_at_initiation')->where('gender', 'M')->count(),
                    'females' => $this->copyQuery($eventQuery)->whereNull('registration_age_at_initiation')->where('gender', 'F')->count()
                ]
            ];
        }else{
            $payload = [
                'total' => $this->copyQuery($eventQuery)->count(),
                'adults' => [
                    'count' => $this->copyQuery($eventQuery)->whereDate('birthdate', '<=', $parsedReportDate->subYears(15))->count(),
                    'males' => [
                        'count' => $this->copyQuery($eventQuery)->where('birthdate', '<=', $parsedReportDate->subYears(15))->where('gender', 'M')->count(),
                        'disaggregatedByAge' => [
                            '15-19' => $this->copyQuery($eventQuery)->whereBetween('birthdate', [$parsedReportDate->subYears(19), $parsedReportDate->subYears(15)])->where('gender', 'M')->count(),
                            '20-24' => $this->copyQuery($eventQuery)->whereBetween('birthdate', [$parsedReportDate->subYears(24), $parsedReportDate->subYears(20)])->where('gender', 'M')->count(),
                            '25-29' => $this->copyQuery($eventQuery)->whereBetween('birthdate', [$parsedReportDate->subYears(29), $parsedReportDate->subYears(25)])->where('gender', 'M')->count(),
                            '30-34' => $this->copyQuery($eventQuery)->whereBetween('birthdate', [$parsedReportDate->subYears(34), $parsedReportDate->subYears(30)])->where('gender', 'M')->count(),
                            '35-39' => $this->copyQuery($eventQuery)->whereBetween('birthdate', [$parsedReportDate->subYears(39), $parsedReportDate->subYears(35)])->where('gender', 'M')->count(),
                            '40-44' => $this->copyQuery($eventQuery)->whereBetween('birthdate', [$parsedReportDate->subYears(44), $parsedReportDate->subYears(40)])->where('gender', 'M')->count(),
                            '45-49' => $this->copyQuery($eventQuery)->whereBetween('birthdate', [$parsedReportDate->subYears(49), $parsedReportDate->subYears(45)])->where('gender', 'M')->count(),
                            '50+' => $this->copyQuery($eventQuery)->whereDate('birthdate', '<=', $parsedReportDate->subYears(50))->where('gender', 'M')->count(),
                        ]
                    ],
                    'females' => [
                        'count' => $this->copyQuery($eventQuery)->where('birthdate', '<=', $parsedReportDate->subYears(15))->where('gender', 'F')->count(),
                        'disaggregatedByAge' => [
                            '15-19' => $this->copyQuery($eventQuery)->whereBetween('birthdate', [$parsedReportDate->subYears(19), $parsedReportDate->subYears(15)])->where('gender', 'F')->count(),
                            '20-24' => $this->copyQuery($eventQuery)->whereBetween('birthdate', [$parsedReportDate->subYears(24), $parsedReportDate->subYears(20)])->where('gender', 'F')->count(),
                            '25-29' => $this->copyQuery($eventQuery)->whereBetween('birthdate', [$parsedReportDate->subYears(29), $parsedReportDate->subYears(25)])->where('gender', 'F')->count(),
                            '30-34' => $this->copyQuery($eventQuery)->whereBetween('birthdate', [$parsedReportDate->subYears(34), $parsedReportDate->subYears(30)])->where('gender', 'F')->count(),
                            '35-39' => $this->copyQuery($eventQuery)->whereBetween('birthdate', [$parsedReportDate->subYears(39), $parsedReportDate->subYears(35)])->where('gender', 'F')->count(),
                            '40-44' => $this->copyQuery($eventQuery)->whereBetween('birthdate', [$parsedReportDate->subYears(44), $parsedReportDate->subYears(40)])->where('gender', 'F')->count(),
                            '45-49' => $this->copyQuery($eventQuery)->whereBetween('birthdate', [$parsedReportDate->subYears(49), $parsedReportDate->subYears(45)])->where('gender', 'F')->count(),
                            '50+' => $this->copyQuery($eventQuery)->whereDate('birthdate', '<=', $parsedReportDate->subYears(50))->where('gender', 'F')->count(),
                        ]
                    ]
                ],
                'pediatrics' => [
                    'count' => $this->copyQuery($eventQuery)->whereDate('birthdate', '>', $parsedReportDate->subYears(15))->count(),
                    'males' => [
                        'count' => $this->copyQuery($eventQuery)->where('birthdate', '>', $parsedReportDate->subYears(15))->where('gender', 'M')->count(),
                        'disaggregatedByAge' => [
                            '<1' => $this->copyQuery($eventQuery)->whereDate('birthdate', '>', $parsedReportDate->subYears(1))->where('gender', 'M')->count(),
                            '1-4' => $this->copyQuery($eventQuery)->whereBetween('birthdate', [$parsedReportDate->subYears(4), $parsedReportDate->subYears(1)])->where('gender', 'M')->count(),
                            '5-9' => $this->copyQuery($eventQuery)->whereBetween('birthdate', [$parsedReportDate->subYears(9), $parsedReportDate->subYears(5)])->where('gender', 'M')->count(),
                            '10-14' => $this->copyQuery($eventQuery)->whereBetween('birthdate', [$parsedReportDate->subYears(14), $parsedReportDate->subYears(10)])->where('gender', 'M')->count()
                        ]
                    ],
                    'females' => [
                        'count' => $this->copyQuery($eventQuery)->where('birthdate', '<', $parsedReportDate->subYears(15))->where('gender', 'F')->count(),
                        'disaggregatedByAge' => [
                            '<1' => $this->copyQuery($eventQuery)->whereDate('birthdate', '>', $parsedReportDate->subYears(1))->where('gender', 'F')->count(),
                            '1-4' => $this->copyQuery($eventQuery)->whereBetween('birthdate', [$parsedReportDate->subYears(4), $parsedReportDate->subYears(1)])->where('gender', 'F')->count(),
                            '5-9' => $this->copyQuery($eventQuery)->whereBetween('birthdate', [$parsedReportDate->subYears(9), $parsedReportDate->subYears(5)])->where('gender', 'F')->count(),
                            '10-14' => $this->copyQuery($eventQuery)->whereBetween('birthdate', [$parsedReportDate->subYears(14), $parsedReportDate->subYears(10)])->where('gender', 'F')->count()
                        ]
                    ]
                ],
                'unknownAge' => [
                    'count' => $this->copyQuery($eventQuery)->whereNull('birthdate')->count(),
                    'males' => $this->copyQuery($eventQuery)->whereNull('birthdate')->where('gender', 'M')->count(),
                    'females' => $this->copyQuery($eventQuery)->whereNull('birthdate')->where('gender', 'F')->count()
                ]
            ];
        }

        return $payload;
    }

    public function copyQuery($query)
    {
        return clone($query);
    }
}
