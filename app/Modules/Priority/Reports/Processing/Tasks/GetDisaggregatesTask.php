<?php

namespace App\Modules\Priority\Reports\Processing\Tasks;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class GetDisaggregatesTask
{
    public function run($eventQuery, $parsedReportDate)
    {
        $payload = [
            'total' =>  $this->copyQuery($eventQuery)->count(),
            'adults' => [
                'count' => $this->copyQuery($eventQuery)->whereDate('birthdate','<=',with(clone $parsedReportDate)->subYears(15))->count(),
                'males' => [
                    'count' => $this->copyQuery($eventQuery)->where('birthdate','<=',with(clone $parsedReportDate)->subYears(15))->where('gender','M')->count(),
                    'disaggregatedByAge' => [
                        '15-19' => $this->copyQuery($eventQuery)->whereBetween('birthdate', [with(clone $parsedReportDate)->subYears(20), with(clone $parsedReportDate)->subYears(15)])->where('gender','M')->count(),
                        '20-24' => $this->copyQuery($eventQuery)->whereBetween('birthdate', [with(clone $parsedReportDate)->subYears(25), with(clone $parsedReportDate)->subYears(20)])->where('gender','M')->count(),
                        '25-29' => $this->copyQuery($eventQuery)->whereBetween('birthdate', [with(clone $parsedReportDate)->subYears(30), with(clone $parsedReportDate)->subYears(25)])->where('gender','M')->count(),
                        '30-34' => $this->copyQuery($eventQuery)->whereBetween('birthdate', [with(clone $parsedReportDate)->subYears(35), with(clone $parsedReportDate)->subYears(30)])->where('gender','M')->count(),
                        '35-39' => $this->copyQuery($eventQuery)->whereBetween('birthdate', [with(clone $parsedReportDate)->subYears(40), with(clone $parsedReportDate)->subYears(35)])->where('gender','M')->count(),
                        '40-44' => $this->copyQuery($eventQuery)->whereBetween('birthdate', [with(clone $parsedReportDate)->subYears(45), with(clone $parsedReportDate)->subYears(40)])->where('gender','M')->count(),
                        '45-49' => $this->copyQuery($eventQuery)->whereBetween('birthdate', [with(clone $parsedReportDate)->subYears(50), with(clone $parsedReportDate)->subYears(45)])->where('gender','M')->count(),
                        '50+' => $this->copyQuery($eventQuery)->whereDate('birthdate', '<=', with(clone $parsedReportDate)->subYears(50))->where('gender','M')->count(),
                    ]
                ],
                'females' => [
                    'count' => $this->copyQuery($eventQuery)->where('birthdate','<=',with(clone $parsedReportDate)->subYears(15))->where('gender','F')->count(),
                    'disaggregatedByAge' => [
                        '15-19' => $this->copyQuery($eventQuery)->whereBetween('birthdate', [with(clone $parsedReportDate)->subYears(20), with(clone $parsedReportDate)->subYears(15)])->where('gender','F')->count(),
                        '20-24' => $this->copyQuery($eventQuery)->whereBetween('birthdate', [with(clone $parsedReportDate)->subYears(25), with(clone $parsedReportDate)->subYears(20)])->where('gender','F')->count(),
                        '25-29' => $this->copyQuery($eventQuery)->whereBetween('birthdate', [with(clone $parsedReportDate)->subYears(30), with(clone $parsedReportDate)->subYears(25)])->where('gender','F')->count(),
                        '30-34' => $this->copyQuery($eventQuery)->whereBetween('birthdate', [with(clone $parsedReportDate)->subYears(35), with(clone $parsedReportDate)->subYears(30)])->where('gender','F')->count(),
                        '35-39' => $this->copyQuery($eventQuery)->whereBetween('birthdate', [with(clone $parsedReportDate)->subYears(40), with(clone $parsedReportDate)->subYears(35)])->where('gender','F')->count(),
                        '40-44' => $this->copyQuery($eventQuery)->whereBetween('birthdate', [with(clone $parsedReportDate)->subYears(45), with(clone $parsedReportDate)->subYears(40)])->where('gender','F')->count(),
                        '45-49' => $this->copyQuery($eventQuery)->whereBetween('birthdate', [with(clone $parsedReportDate)->subYears(50), with(clone $parsedReportDate)->subYears(45)])->where('gender','F')->count(),
                        '50+' => $this->copyQuery($eventQuery)->whereDate('birthdate', '<=', with(clone $parsedReportDate)->subYears(50))->where('gender','F')->count(),
                    ]
                ]
            ],
            'pediatrics' => [
                'count' => $this->copyQuery($eventQuery)->whereDate('birthdate','>',with(clone $parsedReportDate)->subYears(15))->count(),
                'males' => [
                    'count' => $this->copyQuery($eventQuery)->where('birthdate','>',with(clone $parsedReportDate)->subYears(15))->where('gender','M')->count(),
                    'disaggregatedByAge' => [
                        '<1' => $this->copyQuery($eventQuery)->whereDate('birthdate', '>', with(clone $parsedReportDate)->subYears(1))->where('gender','M')->count(),
                        '1-4' => $this->copyQuery($eventQuery)->whereBetween('birthdate', [with(clone $parsedReportDate)->subYears(4), with(clone $parsedReportDate)->subYears(1)])->where('gender','M')->count(),
                        '5-9' => $this->copyQuery($eventQuery)->whereBetween('birthdate', [with(clone $parsedReportDate)->subYears(9), with(clone $parsedReportDate)->subYears(5)])->where('gender','M')->count(),
                        '10-14' => $this->copyQuery($eventQuery)->whereBetween('birthdate', [with(clone $parsedReportDate)->subYears(14), with(clone $parsedReportDate)->subYears(10)])->where('gender','M')->count()
                    ]
                ],
                'females' => [
                    'count' => $this->copyQuery($eventQuery)->where('birthdate','>',with(clone $parsedReportDate)->subYears(15))->where('gender','F')->count(),
                    'disaggregatedByAge' => [
                        '<1' => $this->copyQuery($eventQuery)->whereDate('birthdate', '>', with(clone $parsedReportDate)->subYears(1))->where('gender','F')->count(),
                        '1-4' => $this->copyQuery($eventQuery)->whereBetween('birthdate', [with(clone $parsedReportDate)->subYears(5), with(clone $parsedReportDate)->subYears(1)])->where('gender','F')->count(),
                        '5-9' => $this->copyQuery($eventQuery)->whereBetween('birthdate', [with(clone $parsedReportDate)->subYears(10), with(clone $parsedReportDate)->subYears(5)])->where('gender','F')->count(),
                        '10-14' => $this->copyQuery($eventQuery)->whereBetween('birthdate', [with(clone $parsedReportDate)->subYears(15), with(clone $parsedReportDate)->subYears(10)])->where('gender','F')->count()
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
                    'count' => $this->copyQuery($eventQuery)->where('registration_age', '>=', 15)->count(),
                    'males' => [
                        'count' => $this->copyQuery($eventQuery)->where('registration_age', '>=', 15)->where('gender', 'M')->count(),
                        'disaggregatedByAge' => [
                            '15-19' => $this->copyQuery($eventQuery)->whereBetween('registration_age', [15, 19])->where('gender', 'M')->count(),
                            '20-24' => $this->copyQuery($eventQuery)->whereBetween('registration_age', [20, 24])->where('gender', 'M')->count(),
                            '25-29' => $this->copyQuery($eventQuery)->whereBetween('registration_age', [25, 29])->where('gender', 'M')->count(),
                            '30-34' => $this->copyQuery($eventQuery)->whereBetween('registration_age', [30, 34])->where('gender', 'M')->count(),
                            '35-39' => $this->copyQuery($eventQuery)->whereBetween('registration_age', [35, 39])->where('gender', 'M')->count(),
                            '40-44' => $this->copyQuery($eventQuery)->whereBetween('registration_age', [40, 44])->where('gender', 'M')->count(),
                            '45-49' => $this->copyQuery($eventQuery)->whereBetween('registration_age', [45, 49])->where('gender', 'M')->count(),
                            '50+' => $this->copyQuery($eventQuery)->where('registration_age', '>=', 50)->where('gender', 'M')->count(),
                        ]
                    ],
                    'females' => [
                        'count' => $this->copyQuery($eventQuery)->where('registration_age', '>=', 15)->where('gender', 'F')->count(),
                        'disaggregatedByAge' => [
                            '15-19' => $this->copyQuery($eventQuery)->whereBetween('registration_age', [15, 19])->where('gender', 'F')->count(),
                            '20-24' => $this->copyQuery($eventQuery)->whereBetween('registration_age', [20, 24])->where('gender', 'F')->count(),
                            '25-29' => $this->copyQuery($eventQuery)->whereBetween('registration_age', [25, 29])->where('gender', 'F')->count(),
                            '30-34' => $this->copyQuery($eventQuery)->whereBetween('registration_age', [30, 34])->where('gender', 'F')->count(),
                            '35-39' => $this->copyQuery($eventQuery)->whereBetween('registration_age', [35, 39])->where('gender', 'F')->count(),
                            '40-44' => $this->copyQuery($eventQuery)->whereBetween('registration_age', [40, 44])->where('gender', 'F')->count(),
                            '45-49' => $this->copyQuery($eventQuery)->whereBetween('registration_age', [45, 49])->where('gender', 'F')->count(),
                            '50+' => $this->copyQuery($eventQuery)->where('registration_age', '>=', 15)->where('gender', 'F')->count(),
                        ]
                    ]
                ],
                'pediatrics' => [
                    'count' => $this->copyQuery($eventQuery)->where('registration_age', '<', 15)->count(),
                    'males' => [
                        'count' => $this->copyQuery($eventQuery)->where('registration_age', '<', 15)->where('gender', 'M')->count(),
                        'disaggregatedByAge' => [
                            '<1' => $this->copyQuery($eventQuery)->where('registration_age', '<', 1)->where('gender', 'M')->count(),
                            '1-4' => $this->copyQuery($eventQuery)->whereBetween('registration_age', [1,4])->where('gender', 'M')->count(),
                            '5-9' => $this->copyQuery($eventQuery)->whereBetween('registration_age', [5,9])->where('gender', 'M')->count(),
                            '10-14' => $this->copyQuery($eventQuery)->whereBetween('registration_age', [10,14])->where('gender', 'M')->count()
                        ]
                    ],
                    'females' => [
                        'count' => $this->copyQuery($eventQuery)->where('registration_age', '<', 15)->where('gender', 'F')->count(),
                        'disaggregatedByAge' => [
                            '<1' => $this->copyQuery($eventQuery)->where('registration_age', '<', 1)->where('gender', 'F')->count(),
                            '1-4' => $this->copyQuery($eventQuery)->whereBetween('registration_age', [1,4])->where('gender', 'F')->count(),
                            '5-9' => $this->copyQuery($eventQuery)->whereBetween('registration_age', [5,9])->where('gender', 'F')->count(),
                            '10-14' => $this->copyQuery($eventQuery)->whereBetween('registration_age', [10,14])->where('gender', 'F')->count()
                        ]
                    ]
                ],
                'unknownAge' => [
                    'count' => $this->copyQuery($eventQuery)->whereNull('registration_age')->count(),
                    'males' => $this->copyQuery($eventQuery)->whereNull('registration_age')->where('gender', 'M')->count(),
                    'females' => $this->copyQuery($eventQuery)->whereNull('registration_age')->where('gender', 'F')->count()
                ]
            ];

            //dd($this->copyQuery($eventQuery)->whereBetween('registration_age', [10,14])->where('gender', 'M')->count());
        }else{
            $payload = [
                'total' => $this->copyQuery($eventQuery)->count(),
                'adults' => [
                    'count' => $this->copyQuery($eventQuery)->whereDate('birthdate', '<=', with(clone $parsedReportDate)->subYears(15))->count(),
                    'males' => [
                        'count' => $this->copyQuery($eventQuery)->where('birthdate', '<=', with(clone $parsedReportDate)->subYears(15))->where('gender', 'M')->count(),
                        'disaggregatedByAge' => [
                            '15-19' => $this->copyQuery($eventQuery)->whereBetween('birthdate', [with(clone $parsedReportDate)->subYears(20), with(clone $parsedReportDate)->subYears(15)])->where('gender', 'M')->count(),
                            '20-24' => $this->copyQuery($eventQuery)->whereBetween('birthdate', [with(clone $parsedReportDate)->subYears(25), with(clone $parsedReportDate)->subYears(20)])->where('gender', 'M')->count(),
                            '25-29' => $this->copyQuery($eventQuery)->whereBetween('birthdate', [with(clone $parsedReportDate)->subYears(30), with(clone $parsedReportDate)->subYears(25)])->where('gender', 'M')->count(),
                            '30-34' => $this->copyQuery($eventQuery)->whereBetween('birthdate', [with(clone $parsedReportDate)->subYears(35), with(clone $parsedReportDate)->subYears(30)])->where('gender', 'M')->count(),
                            '35-39' => $this->copyQuery($eventQuery)->whereBetween('birthdate', [with(clone $parsedReportDate)->subYears(40), with(clone $parsedReportDate)->subYears(35)])->where('gender', 'M')->count(),
                            '40-44' => $this->copyQuery($eventQuery)->whereBetween('birthdate', [with(clone $parsedReportDate)->subYears(45), with(clone $parsedReportDate)->subYears(40)])->where('gender', 'M')->count(),
                            '45-49' => $this->copyQuery($eventQuery)->whereBetween('birthdate', [with(clone $parsedReportDate)->subYears(50), with(clone $parsedReportDate)->subYears(45)])->where('gender', 'M')->count(),
                            '50+' => $this->copyQuery($eventQuery)->whereDate('birthdate', '<=', with(clone $parsedReportDate)->subYears(50))->where('gender', 'M')->count(),
                        ]
                    ],
                    'females' => [
                        'count' => $this->copyQuery($eventQuery)->where('birthdate', '<=', with(clone $parsedReportDate)->subYears(15))->where('gender', 'F')->count(),
                        'disaggregatedByAge' => [
                            '15-19' => $this->copyQuery($eventQuery)->whereBetween('birthdate', [with(clone $parsedReportDate)->subYears(20), with(clone $parsedReportDate)->subYears(15)])->where('gender', 'F')->count(),
                            '20-24' => $this->copyQuery($eventQuery)->whereBetween('birthdate', [with(clone $parsedReportDate)->subYears(25), with(clone $parsedReportDate)->subYears(20)])->where('gender', 'F')->count(),
                            '25-29' => $this->copyQuery($eventQuery)->whereBetween('birthdate', [with(clone $parsedReportDate)->subYears(30), with(clone $parsedReportDate)->subYears(25)])->where('gender', 'F')->count(),
                            '30-34' => $this->copyQuery($eventQuery)->whereBetween('birthdate', [with(clone $parsedReportDate)->subYears(35), with(clone $parsedReportDate)->subYears(30)])->where('gender', 'F')->count(),
                            '35-39' => $this->copyQuery($eventQuery)->whereBetween('birthdate', [with(clone $parsedReportDate)->subYears(40), with(clone $parsedReportDate)->subYears(35)])->where('gender', 'F')->count(),
                            '40-44' => $this->copyQuery($eventQuery)->whereBetween('birthdate', [with(clone $parsedReportDate)->subYears(45), with(clone $parsedReportDate)->subYears(40)])->where('gender', 'F')->count(),
                            '45-49' => $this->copyQuery($eventQuery)->whereBetween('birthdate', [with(clone $parsedReportDate)->subYears(50), with(clone $parsedReportDate)->subYears(45)])->where('gender', 'F')->count(),
                            '50+' => $this->copyQuery($eventQuery)->whereDate('birthdate', '<=', with(clone $parsedReportDate)->subYears(50))->where('gender', 'F')->count(),
                        ]
                    ]
                ],
                'pediatrics' => [
                    'count' => $this->copyQuery($eventQuery)->whereDate('birthdate', '>', with(clone $parsedReportDate)->subYears(15))->count(),
                    'males' => [
                        'count' => $this->copyQuery($eventQuery)->where('birthdate', '>', with(clone $parsedReportDate)->subYears(15))->where('gender', 'M')->count(),
                        'disaggregatedByAge' => [
                            '<1' => $this->copyQuery($eventQuery)->whereDate('birthdate', '>', with(clone $parsedReportDate)->subYears(1))->where('gender', 'M')->count(),
                            '1-4' => $this->copyQuery($eventQuery)->whereBetween('birthdate', [with(clone $parsedReportDate)->subYears(5), with(clone $parsedReportDate)->subYears(1)])->where('gender', 'M')->count(),
                            '5-9' => $this->copyQuery($eventQuery)->whereBetween('birthdate', [with(clone $parsedReportDate)->subYears(10), with(clone $parsedReportDate)->subYears(5)])->where('gender', 'M')->count(),
                            '10-14' => $this->copyQuery($eventQuery)->whereBetween('birthdate', [with(clone $parsedReportDate)->subYears(15), with(clone $parsedReportDate)->subYears(10)])->where('gender', 'M')->count()
                        ]
                    ],
                    'females' => [
                        'count' => $this->copyQuery($eventQuery)->where('birthdate', '>', with(clone $parsedReportDate)->subYears(15))->where('gender', 'F')->count(),
                        'disaggregatedByAge' => [
                            '<1' => $this->copyQuery($eventQuery)->whereDate('birthdate', '>', with(clone $parsedReportDate)->subYears(1))->where('gender', 'F')->count(),
                            '1-4' => $this->copyQuery($eventQuery)->whereBetween('birthdate', [with(clone $parsedReportDate)->subYears(5), with(clone $parsedReportDate)->subYears(1)])->where('gender', 'F')->count(),
                            '5-9' => $this->copyQuery($eventQuery)->whereBetween('birthdate', [with(clone $parsedReportDate)->subYears(10), with(clone $parsedReportDate)->subYears(5)])->where('gender', 'F')->count(),
                            '10-14' => $this->copyQuery($eventQuery)->whereBetween('birthdate', [with(clone $parsedReportDate)->subYears(15), with(clone $parsedReportDate)->subYears(10)])->where('gender', 'F')->count()
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
        return clone $query;
    }
}
