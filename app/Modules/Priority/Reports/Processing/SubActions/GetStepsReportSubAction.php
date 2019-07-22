<?php

namespace App\Modules\Priority\Reports\Processing\SubActions;

use App\Modules\Core\Concepts\Concepts;
use App\Modules\Core\EncounterTypes\EncounterTypes;
use App\Modules\Core\Patients\Patients;
use App\Modules\Priority\Reports\Processing\Tasks\GetDefaultersTask;
use App\Modules\Priority\Reports\Processing\Tasks\GetLastEncounterTask;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\App;

class GetStepsReportSubAction
{
    public function run(Collection $patients)
    {
        $ARTStop = collect();
        $Died = collect();
        $TransIn = collect();
        $TransOut= collect();
        $Restart = collect();

        foreach ($patients as $patient)
        {
            $lastStep = $patient->steps->last();

            if ($lastStep !== null)
            {
                if ($lastStep->step == 'ART Stop')
                    $ARTStop->push($patient);
                elseif ($lastStep->step == 'Died')
                    $Died->push($patient);
                elseif ($lastStep->step == 'Trans-in')
                    $TransIn->push($patient);
                elseif ($lastStep->step == 'Trans-out')
                    $TransOut->push($patient);
                elseif ($lastStep->step == 'Restart')
                    $Restart->push($patient);
            }
        }

        return [
                'ART Stop' => $ARTStop,
                'Died' => $Died,
                'Trans-in' => $TransIn,
                'Trans-out' => $TransOut,
                'Restart' => $Restart,
        ];
    }
}
