<?php

namespace App\Modules\Priority\Reports\Processing\SubActions;

use App\Modules\Core\Concepts\Concepts;
use App\Modules\Core\EncounterTypes\EncounterTypes;
use App\Modules\Core\Patients\Patients;
use App\Modules\Priority\Reports\Processing\Tasks\GetLastEncounterTask;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\App;

class GetLastViralLoadReportSubAction
{
    public function run(Collection $patients)
    {
        $conceptRepo = Concepts::repository();

        $lastViralLoadConcept = $conceptRepo->get(46);
        $adverseOutcomeConcept = $conceptRepo->get(48);

        $encounterType = EncounterTypes::repository()->get(4);

        $lastViralLoadOver1000 = collect();

        foreach ($patients as $patient)
        {
            #Get Last Encounter
            $lastEncounter = App::make(GetLastEncounterTask::class)->run($patient, $encounterType);

            if (is_null($lastEncounter))
                continue;

            #Get ConceptObs
            #Last ViralLoad Obs
            $lastViralLoad = $lastEncounter->observations->where('concept_id', $lastViralLoadConcept->concept_id)->first();

            #AdverseOutcome
            $adverseOutcome = $lastEncounter->observations->where('concept_id', $adverseOutcomeConcept->concept_id)->first();

            if (is_null($lastViralLoad))
                continue;

            if (is_null($lastViralLoad->value))
                continue;

            #Check if Past Today and if not Dead
            if (
                $lastViralLoad->value > 1000 &&
                is_null($adverseOutcome->value)
            )
                $lastViralLoadOver1000->push($patient);
        };

        return $lastViralLoadOver1000;
    }
}
