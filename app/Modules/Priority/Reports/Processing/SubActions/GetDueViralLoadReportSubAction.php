<?php

namespace App\Modules\Priority\Reports\Processing\SubActions;

use App\Modules\Core\Concepts\Concepts;
use App\Modules\Core\EncounterTypes\EncounterTypes;
use App\Modules\Core\Patients\Patients;
use App\Modules\Priority\Reports\Processing\Tasks\GetLastEncounterTask;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\App;

class GetDueViralLoadReportSubAction
{
    public function run(Collection $patients)
    {
        $today = Carbon::today();
        $conceptRepo = Concepts::repository();

        $startDateConcept = $conceptRepo->get(23);
        $visitDateConcept = $conceptRepo->get(32);
        $viralLoadSampleTakenConcept = $conceptRepo->get(45);

        $encounterType = EncounterTypes::repository()->get(4);

        $due6Months = collect();
        $due12Months = collect();
        $dueAfter12Months = collect();

        foreach ($patients as $patient)
        {
            #Get Last Encounter
            $lastEncounter = App::make(GetLastEncounterTask::class)->run($patient, $encounterType);

            if (is_null($lastEncounter))
                continue;

            #Get ConceptObs
            #StartDateObs
            $startDate = $patient->person->observations->where('concept_id', $startDateConcept->concept_id)->last();

            if (is_null($startDate) || is_null($lastEncounter))
                continue;

            if (empty($startDate->value))
            {
                $firstVisitEncounter = $patient->encounters->where('encounter_type', $encounterType->encounter_type_id)->first();
                if (is_null($firstVisitEncounter))
                    continue;

                $startDate = $firstVisitEncounter->observations->where('concept_id',$visitDateConcept->concept_id);
            }
            #VisitDateObs
            $visitDate = $lastEncounter->observations->where('concept_id', $visitDateConcept->concept_id)->first();

            #ViralLoadSampleTakenObs
            $viralLoadSampleTaken = $lastEncounter->observations->where('concept_id', $viralLoadSampleTakenConcept->concept_id)->first();

            #AdverseOutcome
            $adverseOutcome = $patient->steps->where('step','Died')->count();

            if (is_null($visitDate))
                continue;
            #Get Month Difference for 6,12,After 12
            $parsedVisitDate = Carbon::parse($visitDate->value);
            $dateAfter6Months = Carbon::parse($startDate->value)->addMonth(6);
            $dateAfter12Months = Carbon::parse($startDate->value)->addMonth(12);
            $dateAfter13Months = Carbon::parse($startDate->value)->addMonth(13);
            #Check if Past Today and if not Dead
            if (
                $today->greaterThan($dateAfter6Months) &&
                $today->lessThan($dateAfter12Months) &&
                $viralLoadSampleTaken->value == 'Bled'&&
                $adverseOutcome === 0
            )
                $due6Months->push($patient);
            elseif (
                $today->greaterThan($dateAfter12Months) &&
                $today->lessThan($dateAfter13Months) &&
                $viralLoadSampleTaken->value == 'Bled'&&
                $adverseOutcome === 0

            )
                $due12Months->push($patient);
            elseif (
                $today->greaterThan($dateAfter13Months) &&
                $parsedVisitDate->lessThan($dateAfter13Months) &&
                $viralLoadSampleTaken->value == 'Bled'&&
                $adverseOutcome === 0
            )
                $dueAfter12Months->push($patient);
        };

        return [
            'due6Months' => $due6Months,
            'due12Months' => $due12Months,
            'dueAfter12Months' => $dueAfter12Months
        ];
    }
}
