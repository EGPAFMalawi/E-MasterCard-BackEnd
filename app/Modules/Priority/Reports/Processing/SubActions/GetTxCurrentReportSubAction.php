<?php

namespace App\Modules\Priority\Reports\Processing\SubActions;

use App\Modules\Core\Concepts\Concepts;
use App\Modules\Core\EncounterTypes\EncounterTypes;
use App\Modules\Core\Patients\Patients;
use App\Modules\Priority\Reports\Processing\Tasks\GetDefaultersTask;
use App\Modules\Priority\Reports\Processing\Tasks\GetLastEncounterTask;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\App;

class GetTxCurrentReportSubAction
{
    public function run(Collection $patients)
    {
        $defaulters = App::make(GetDefaultersTask::class)->run($patients);

        $encounterType = EncounterTypes::repository()->get(4);

        $patientsWithoutOutcome = $patients->filter(function ($patient) use ($encounterType){
            #Get Last Encounter
            $lastEncounter = App::make(GetLastEncounterTask::class)->run($patient, $encounterType);

            if (is_null($lastEncounter))
                return false;

            #AdverseOutcome

            #Check if Past Today and if not Dead
            if (
            $patient->steps->where('step','Died')->count() == 0
            )
                return true;

            return false;
        });


        return [
            'PEPFARTXCurrent' => $patientsWithoutOutcome->diff($defaulters['PEPFARDefaulters']),
            'MOHTXCurrent' => $patientsWithoutOutcome->diff($defaulters['MOHDefaulters']),
        ];
    }
}
