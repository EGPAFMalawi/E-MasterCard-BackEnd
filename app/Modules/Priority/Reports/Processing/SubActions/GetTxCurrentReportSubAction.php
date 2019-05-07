<?php

namespace App\Modules\Priority\Reports\Processing\SubActions;

use App\Modules\Core\Concepts\Concepts;
use App\Modules\Core\EncounterTypes\EncounterTypes;
use App\Modules\Core\Patients\Patients;
use App\Modules\Priority\Reports\Processing\Tasks\GetDefaultersTask;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\App;

class GetTxCurrentReportSubAction
{
    public function run(Collection $patients)
    {
        $defaulters = App::make(GetDefaultersTask::class)->run($patients);

        $adverseOutcomeConcept = Concepts::repository()->get(48);
        $encounterType = EncounterTypes::repository()->get(4);

        $patientsWithoutOutcome = $patients->filter(function ($patient) use ($adverseOutcomeConcept,$encounterType){
            #Get Last Encounter
            $lastEncounter = $patient->encounters->where('encounter_type', $encounterType->encounter_type_id)->last();
            if (is_null($lastEncounter))
                return false;

            #AdverseOutcome
            $adverseOutcome = $lastEncounter->observations->where('concept_id', $adverseOutcomeConcept->concept_id)->first();

            #Check if Past Today and if not Dead
            if (
            is_null($adverseOutcome)
            )
                return true;

            if (
            is_null($adverseOutcome->value)
            )
                return true;

            return false;
        });


        return [
            'CDCTXCurrent' => $patientsWithoutOutcome->diff($defaulters['CDCDefaulters']),
            'MOHTXCurrent' => $patientsWithoutOutcome->diff($defaulters['MOHDefaulters']),
        ];
    }
}
