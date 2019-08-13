<?php

namespace App\Modules\Priority\Reports\Processing\SubActions;

use App\Modules\Core\Concepts\Concepts;
use App\Modules\Core\EncounterTypes\EncounterTypes;
use App\Modules\Core\Observations\Data\Models\Observation;
use App\Modules\Core\Patients\Data\Models\Patient;
use App\Modules\Core\Patients\Patients;
use App\Modules\Priority\Reports\Processing\Tasks\GetLastVisitEncounterTask;
use App\Modules\Priority\Reports\Processing\Tasks\GetPatientsWithoutAdverseOutcomesTask;
use function foo\func;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\App;


class GetEveryoneOnDTGReportSubAction
{
    public function run(Collection $patients)
    {
        $conceptRepo = Concepts::repository();

        $ARTRegimenConcept = $conceptRepo->get(39);

        $encounterType = EncounterTypes::repository()->get(4);

        $allOnDTG = collect();

        foreach ($patients as $patient)
        {
            #Get Last Encounter
            $lastEncounter = App::make(GetLastVisitEncounterTask::class)->run($patient, $encounterType);

            if (is_null($lastEncounter))
                continue;

            #Get ConceptObs
            #ART RegimenObs
            $ARTRegimen = $lastEncounter->observations->where('concept_id', $ARTRegimenConcept->concept_id)->first();

            #AdverseOutcome
            $adverseOutcome = $patient->steps->where('step','Died')->count();

            if (is_null($ARTRegimen))
                continue;
            if (is_null($ARTRegimen->value))
                continue;

            #Check if Past Today and if not Dead
            if (
                (
                    $ARTRegimen->value == '12A' ||
                    $ARTRegimen->value == '13A' ||
                    $ARTRegimen->value == '14A'
                )&&
                $adverseOutcome === 0
            )
                $allOnDTG->push($patient);
        };

        return $allOnDTG;
    }

    public function run2()
    {
        ### STILL UNDER WORKS TO SORT BY VISIT DATE ######
        $lastVisitEncounters = App::make(GetLastVisitEncounterTask::class)->run2();

        $regimenObs = Observation::query()->whereIn('encounter_id', $lastVisitEncounters->pluck('encounter_id'))
            ->where('concept_id', 39)
            ->whereNotNull('value_text')
            ->WhereIn('value_text', ['12A', '13A', '14A'])
            ->get();

        $patients = Patient::whereIn('patient_id', $regimenObs->pluck('person_id'))->get();

        return App::make(GetPatientsWithoutAdverseOutcomesTask::class)->run($patients);
    }
}
