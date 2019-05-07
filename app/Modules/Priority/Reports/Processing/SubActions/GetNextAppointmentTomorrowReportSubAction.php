<?php

namespace App\Modules\Priority\Reports\Processing\SubActions;

use App\Modules\Core\Concepts\Concepts;
use App\Modules\Core\EncounterTypes\EncounterTypes;
use App\Modules\Core\Patients\Patients;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class GetNextAppointmentTomorrowReportSubAction
{
    public function run(Collection $patients)
    {
        $tomorrow = Carbon::tomorrow();
        $conceptRepo = Concepts::repository();

        $nextAppointmentDateConcept = $conceptRepo->get(47);
        $adverseOutcomeConcept = $conceptRepo->get(48);

        $encounterType = EncounterTypes::repository()->get(4);

        $tomorrowsAppointments = collect();

        foreach ($patients as $patient)
        {
            #Get Last Encounter
            $lastEncounter = $patient->encounters->where('encounter_type', $encounterType->encounter_type_id)->last();

            #Get ConceptObs
            #Next Appointment DateObs
            $nextAppointmentDate = $patient->person->observations->where('concept_id', $nextAppointmentDateConcept->concept_id)->first();

            if (is_null($lastEncounter))
                continue;
            #AdverseOutcome
            $adverseOutcome = $lastEncounter->observations->where('concept_id', $adverseOutcomeConcept->concept_id)->first();

            if (is_null($nextAppointmentDate->value))
                continue;

            #Check for Time
            $parsedNextAppointmentDate = Carbon::parse($nextAppointmentDate->value);

            #Check if Past Today and if not Dead
            if (
                $parsedNextAppointmentDate->equalTo($tomorrow) &&
                is_null($adverseOutcome->value)
            )
                $tomorrowsAppointments->push($patient);
        };

        return $tomorrowsAppointments;
    }
}
