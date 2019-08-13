<?php

namespace App\Modules\Priority\Reports\Processing\SubActions;

use App\Modules\Core\Concepts\Concepts;
use App\Modules\Core\EncounterTypes\EncounterTypes;
use App\Modules\Core\Observations\Data\Models\Observation;
use App\Modules\Core\Patients\Data\Models\Patient;
use App\Modules\Core\Patients\Patients;
use App\Modules\Priority\Reports\Processing\Tasks\GetLastVisitEncounterTask;
use App\Modules\Priority\Reports\Processing\Tasks\GetPatientsWithoutAdverseOutcomesTask;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\App;

class GetLastViralLoadReportSubAction
{
    public function run(Collection $patients)
    {
        $conceptRepo = Concepts::repository();

        $lastViralLoadConcept = $conceptRepo->get(46);

        $encounterType = EncounterTypes::repository()->get(4);

        $lastViralLoadOver1000 = collect();

        foreach ($patients as $patient)
        {
            #Get Last Encounter
            $lastEncounter = App::make(GetLastVisitEncounterTask::class)->run($patient, $encounterType);

            if (is_null($lastEncounter))
                continue;

            #Get ConceptObs
            #Last ViralLoad Obs
            $lastViralLoad = $lastEncounter->observations->where('concept_id', $lastViralLoadConcept->concept_id)->first();

            #AdverseOutcome
            $adverseOutcome = $patient->steps->where('step','Died')->count();

            if (is_null($lastViralLoad))
                continue;

            if (is_null($lastViralLoad->value))
                continue;

            #Check if Past Today and if not Dead
            if (
                $lastViralLoad->value > 1000 &&
                $adverseOutcome === 0
            )
                $lastViralLoadOver1000->push($patient);
        };

        return $lastViralLoadOver1000;
    }

    public function run2()
    {
        ### STILL UNDER WORKS TO SORT BY VISIT DATE ######
        $lastVisitEncounters = App::make(GetLastVisitEncounterTask::class)->run2();

        $lastViralLoadObs = Observation::query()->whereIn('encounter_id', $lastVisitEncounters->pluck('encounter_id'))
            ->where('concept_id', 46)
            ->whereNotNull('value_text')
            ->where('value_text', '>', 1000)
            ->get();

        $patients = Patient::whereIn('patient_id', $lastViralLoadObs->pluck('person_id'))->get();

        return App::make(GetPatientsWithoutAdverseOutcomesTask::class)->run($patients);
    }
}
