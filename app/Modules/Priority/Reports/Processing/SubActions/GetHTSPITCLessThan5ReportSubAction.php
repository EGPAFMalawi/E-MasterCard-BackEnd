<?php

namespace App\Modules\Priority\Reports\Processing\SubActions;

use App\Modules\Core\Concepts\Concepts;
use App\Modules\Core\EncounterTypes\EncounterTypes;
use App\Modules\Core\Patients\Patients;
use App\Modules\Priority\HTSRecords\Data\Models\HTSRecord;
use App\Modules\Priority\Reports\Processing\Tasks\GetLastEncounterTask;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;


class GetHTSPITCLessThan5ReportSubAction
{
    public function run($query)
    {
        $query->where('modality','PITC < 5');

        $payload = [
            'newPositive' => [
                'disaggregatedByAge' => [
                    '<1' => [
                        'male' => $this->copyQuery($query)->where([['sex', '=', 'Male'], ['status', '=', 'New Positive']])->where('age','<',1)->count(),
                        'female' => $this->copyQuery($query)->where([['sex', '!=', 'Male'], ['status', '=', 'New Positive']])->where('age','<',1)->count()
                    ],
                    '1-4' => [
                        'male' => $this->copyQuery($query)->where([['sex', '=', 'Male'], ['status', '=', 'New Positive']])->whereBetween('age',[1,4])->count(),
                        'female' => $this->copyQuery($query)->where([['sex', '!=', 'Male'], ['status', '=', 'New Positive']])->whereBetween('age',[1,4])->count(),
                    ],
                    '5-9' => [
                        'male' => $this->copyQuery($query)->where([['sex', '=', 'Male'], ['status', '=', 'New Positive']])->whereBetween('age',[5,9])->count(),
                        'female' => $this->copyQuery($query)->where([['sex', '!=', 'Male'], ['status', '=', 'New Positive']])->whereBetween('age',[5,9])->count(),
                    ],
                    '10-14' => [
                        'male' => $this->copyQuery($query)->where([['sex', '=', 'Male'], ['status', '=', 'New Positive']])->whereBetween('age',[10,14])->count(),
                        'female' => $this->copyQuery($query)->where([['sex', '!=', 'Male'], ['status', '=', 'New Positive']])->whereBetween('age',[10,14])->count(),
                    ],
                    '15-19' => [
                        'male' => $this->copyQuery($query)->where([['sex', '=', 'Male'], ['status', '=', 'New Positive']])->whereBetween('age',[15,19])->count(),
                        'female' => $this->copyQuery($query)->where([['sex', '!=', 'Male'], ['status', '=', 'New Positive']])->whereBetween('age',[15,19])->count(),
                    ],
                    '20-24' => [
                        'male' => $this->copyQuery($query)->where([['sex', '=', 'Male'], ['status', '=', 'New Positive']])->whereBetween('age',[20,24])->count(),
                        'female' => $this->copyQuery($query)->where([['sex', '!=', 'Male'], ['status', '=', 'New Positive']])->whereBetween('age',[20,24])->count(),
                    ],
                    '25-29' => [
                        'male' => $this->copyQuery($query)->where([['sex', '=', 'Male'], ['status', '=', 'New Positive']])->whereBetween('age',[25,29])->count(),
                        'female' => $this->copyQuery($query)->where([['sex', '!=', 'Male'], ['status', '=', 'New Positive']])->whereBetween('age',[25,29])->count(),
                    ],
                    '30-34' => [
                        'male' => $this->copyQuery($query)->where([['sex', '=', 'Male'], ['status', '=', 'New Positive']])->whereBetween('age',[30,34])->count(),
                        'female' => $this->copyQuery($query)->where([['sex', '!=', 'Male'], ['status', '=', 'New Positive']])->whereBetween('age',[30,34])->count(),
                    ],
                    '35-39' => [
                        'male' => $this->copyQuery($query)->where([['sex', '=', 'Male'], ['status', '=', 'New Positive']])->whereBetween('age',[35,39])->count(),
                        'female' => $this->copyQuery($query)->where([['sex', '!=', 'Male'], ['status', '=', 'New Positive']])->whereBetween('age',[35,39])->count(),
                    ],
                    '40-44' => [
                        'male' => $this->copyQuery($query)->where([['sex', '=', 'Male'], ['status', '=', 'New Positive']])->whereBetween('age',[40,44])->count(),
                        'female' => $this->copyQuery($query)->where([['sex', '!=', 'Male'], ['status', '=', 'New Positive']])->whereBetween('age',[40,44])->count(),
                    ],
                    '45-49' => [
                        'male' => $this->copyQuery($query)->where([['sex', '=', 'Male'], ['status', '=', 'New Positive']])->whereBetween('age',[45,49])->count(),
                        'female' => $this->copyQuery($query)->where([['sex', '!=', 'Male'], ['status', '=', 'New Positive']])->whereBetween('age',[45,49])->count(),
                    ],
                    '50+' => [
                        'male' => $this->copyQuery($query)->where([['sex', '=', 'Male'], ['status', '=', 'New Positive']])->where('age','>=',50)->count(),
                        'female' => $this->copyQuery($query)->where([['sex', '!=', 'Male'], ['status', '=', 'New Positive']])->where('age','>=',50)->count(),
                    ]
                ],
                'totalMale' => $this->copyQuery($query)->where([['sex', '=', 'Male'], ['status', '=', 'New Positive']])->count(),
                'totalFemale' => $this->copyQuery($query)->where([['sex', '!=', 'Male'], ['status', '=', 'New Positive']])->count(),
                'total' => $this->copyQuery($query)->where('status', '=', 'New Positive')->count(),

            ],
            'newNegative' => [
                'disaggregatedByAge' => [
                    '<1' => [
                        'male' => $this->copyQuery($query)->where([['sex', '=', 'Male'], ['status', '=', 'New Negative']])->where('age','<',1)->count(),
                        'female' => $this->copyQuery($query)->where([['sex', '!=', 'Male'], ['status', '=', 'New Negative']])->where('age','<',1)->count()
                    ],
                    '1-4' => [
                        'male' => $this->copyQuery($query)->where([['sex', '=', 'Male'], ['status', '=', 'New Negative']])->whereBetween('age',[1,4])->count(),
                        'female' => $this->copyQuery($query)->where([['sex', '!=', 'Male'], ['status', '=', 'New Negative']])->whereBetween('age',[1,4])->count(),
                    ],
                    '5-9' => [
                        'male' => $this->copyQuery($query)->where([['sex', '=', 'Male'], ['status', '=', 'New Negative']])->whereBetween('age',[5,9])->count(),
                        'female' => $this->copyQuery($query)->where([['sex', '!=', 'Male'], ['status', '=', 'New Negative']])->whereBetween('age',[5,9])->count(),
                    ],
                    '10-14' => [
                        'male' => $this->copyQuery($query)->where([['sex', '=', 'Male'], ['status', '=', 'New Negative']])->whereBetween('age',[10,14])->count(),
                        'female' => $this->copyQuery($query)->where([['sex', '!=', 'Male'], ['status', '=', 'New Negative']])->whereBetween('age',[10,14])->count(),
                    ],
                    '15-19' => [
                        'male' => $this->copyQuery($query)->where([['sex', '=', 'Male'], ['status', '=', 'New Negative']])->whereBetween('age',[15,19])->count(),
                        'female' => $this->copyQuery($query)->where([['sex', '!=', 'Male'], ['status', '=', 'New Negative']])->whereBetween('age',[15,19])->count(),
                    ],
                    '20-24' => [
                        'male' => $this->copyQuery($query)->where([['sex', '=', 'Male'], ['status', '=', 'New Negative']])->whereBetween('age',[20,24])->count(),
                        'female' => $this->copyQuery($query)->where([['sex', '!=', 'Male'], ['status', '=', 'New Negative']])->whereBetween('age',[20,24])->count(),
                    ],
                    '25-29' => [
                        'male' => $this->copyQuery($query)->where([['sex', '=', 'Male'], ['status', '=', 'New Negative']])->whereBetween('age',[25,29])->count(),
                        'female' => $this->copyQuery($query)->where([['sex', '!=', 'Male'], ['status', '=', 'New Negative']])->whereBetween('age',[25,29])->count(),
                    ],
                    '30-34' => [
                        'male' => $this->copyQuery($query)->where([['sex', '=', 'Male'], ['status', '=', 'New Negative']])->whereBetween('age',[30,34])->count(),
                        'female' => $this->copyQuery($query)->where([['sex', '!=', 'Male'], ['status', '=', 'New Negative']])->whereBetween('age',[30,34])->count(),
                    ],
                    '35-39' => [
                        'male' => $this->copyQuery($query)->where([['sex', '=', 'Male'], ['status', '=', 'New Negative']])->whereBetween('age',[35,39])->count(),
                        'female' => $this->copyQuery($query)->where([['sex', '!=', 'Male'], ['status', '=', 'New Negative']])->whereBetween('age',[35,39])->count(),
                    ],
                    '40-44' => [
                        'male' => $this->copyQuery($query)->where([['sex', '=', 'Male'], ['status', '=', 'New Negative']])->whereBetween('age',[40,44])->count(),
                        'female' => $this->copyQuery($query)->where([['sex', '!=', 'Male'], ['status', '=', 'New Negative']])->whereBetween('age',[40,44])->count(),
                    ],
                    '45-49' => [
                        'male' => $this->copyQuery($query)->where([['sex', '=', 'Male'], ['status', '=', 'New Negative']])->whereBetween('age',[45,49])->count(),
                        'female' => $this->copyQuery($query)->where([['sex', '!=', 'Male'], ['status', '=', 'New Negative']])->whereBetween('age',[45,49])->count(),
                    ],
                    '50+' => [
                        'male' => $this->copyQuery($query)->where([['sex', '=', 'Male'], ['status', '=', 'New Negative']])->where('age','>=',50)->count(),
                        'female' => $this->copyQuery($query)->where([['sex', '!=', 'Male'], ['status', '=', 'New Negative']])->where('age','>=',50)->count(),
                    ]
                ],
                'totalMale' => $this->copyQuery($query)->where([['sex', '=', 'Male'], ['status', '=', 'New Negative']])->count(),
                'totalFemale' => $this->copyQuery($query)->where([['sex', '!=', 'Male'], ['status', '=', 'New Negative']])->count(),
                'total' => $this->copyQuery($query)->where('status', '=', 'New Negative')->count(),
            ],
            'totalTested' => [
                'disaggregatedByAge' => [
                    '<1' => [
                        'male' => $this->copyQuery($query)->where('sex', '=', 'Male')->where('age','<',1)->count(),
                        'female' => $this->copyQuery($query)->where('sex', '!=', 'Male')->where('age','<',1)->count()
                    ],
                    '1-4' => [
                        'male' => $this->copyQuery($query)->where('sex', '=', 'Male')->whereBetween('age',[1,4])->count(),
                        'female' => $this->copyQuery($query)->where('sex', '!=', 'Male')->whereBetween('age',[1,4])->count(),
                    ],
                    '5-9' => [
                        'male' => $this->copyQuery($query)->where('sex', '=', 'Male')->whereBetween('age',[5,9])->count(),
                        'female' => $this->copyQuery($query)->where('sex', '!=', 'Male')->whereBetween('age',[5,9])->count(),
                    ],
                    '10-14' => [
                        'male' => $this->copyQuery($query)->where('sex', '=', 'Male')->whereBetween('age',[10,14])->count(),
                        'female' => $this->copyQuery($query)->where('sex', '!=', 'Male')->whereBetween('age',[10,14])->count(),
                    ],
                    '15-19' => [
                        'male' => $this->copyQuery($query)->where('sex', '=', 'Male')->whereBetween('age',[15,19])->count(),
                        'female' => $this->copyQuery($query)->where('sex', '!=', 'Male')->whereBetween('age',[15,19])->count(),
                    ],
                    '20-24' => [
                        'male' => $this->copyQuery($query)->where('sex', '=', 'Male')->whereBetween('age',[20,24])->count(),
                        'female' => $this->copyQuery($query)->where('sex', '!=', 'Male')->whereBetween('age',[20,24])->count(),
                    ],
                    '25-29' => [
                        'male' => $this->copyQuery($query)->where('sex', '=', 'Male')->whereBetween('age',[25,29])->count(),
                        'female' => $this->copyQuery($query)->where('sex', '!=', 'Male')->whereBetween('age',[25,29])->count(),
                    ],
                    '30-34' => [
                        'male' => $this->copyQuery($query)->where('sex', '=', 'Male')->whereBetween('age',[30,34])->count(),
                        'female' => $this->copyQuery($query)->where('sex', '!=', 'Male')->whereBetween('age',[30,34])->count(),
                    ],
                    '35-39' => [
                        'male' => $this->copyQuery($query)->where('sex', '=', 'Male')->whereBetween('age',[35,39])->count(),
                        'female' => $this->copyQuery($query)->where('sex', '!=', 'Male')->whereBetween('age',[35,39])->count(),
                    ],
                    '40-44' => [
                        'male' => $this->copyQuery($query)->where('sex', '=', 'Male')->whereBetween('age',[40,44])->count(),
                        'female' => $this->copyQuery($query)->where('sex', '!=', 'Male')->whereBetween('age',[40,44])->count(),
                    ],
                    '45-49' => [
                        'male' => $this->copyQuery($query)->where('sex', '=', 'Male')->whereBetween('age',[45,49])->count(),
                        'female' => $this->copyQuery($query)->where('sex', '!=', 'Male')->whereBetween('age',[45,49])->count(),
                    ],
                    '50+' => [
                        'male' => $this->copyQuery($query)->where('sex', '=', 'Male')->where('age','>=',50)->count(),
                        'female' => $this->copyQuery($query)->where('sex', '!=', 'Male')->where('age','>=',50)->count(),
                    ]
                ],
                'totalMale' => $this->copyQuery($query)->where('sex', '=', 'Male')->count(),
                'totalFemale' => $this->copyQuery($query)->where('sex', '!=', 'Male')->count(),
                'total' => $query->count(),
            ]
        ];

        return $payload;
    }

    public function copyQuery($query)
    {
        return clone($query);
    }
}
