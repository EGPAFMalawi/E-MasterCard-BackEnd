<?php

namespace App\Modules\Priority\Reports\Processing\SubActions;

use App\Modules\Core\Concepts\Concepts;
use App\Modules\Core\EncounterTypes\EncounterTypes;
use App\Modules\Core\Patients\Patients;
use App\Modules\Priority\Reports\Processing\Tasks\GetLastEncounterTask;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\App;


class GetMissedAppointmentsReportSubAction
{
    public function run(Collection $patients, $days = 14)
    {
        $today = Carbon::today();
        $conceptRepo = Concepts::repository();

        $nextAppointmentDateConcept = $conceptRepo->get(47);
        $adverseOutcomeConcept = $conceptRepo->get(48);

        $encounterType = EncounterTypes::repository()->get(4);

        $missedAppointments = collect();

        foreach ($patients as $patient)
        {
            #Get Last Encounter
            $lastEncounter = App::make(GetLastEncounterTask::class)->run($patient, $encounterType);

            if (is_null($lastEncounter))
                continue;

            #Get ConceptObs
            #Next Appointment DateObs
            $nextAppointmentDate = $lastEncounter->observations->where('concept_id', $nextAppointmentDateConcept->concept_id)->first();

            #AdverseOutcome
            $adverseOutcome = $lastEncounter->observations->where('concept_id', $adverseOutcomeConcept->concept_id)->first();

            if (is_null($nextAppointmentDate))
                continue;

            if (is_null($nextAppointmentDate->value))
                continue;

            #Check for Time
            $parsedNextAppointmentDate = Carbon::parse($nextAppointmentDate->value);

            #Check if Past Today and if not Dead
            if (
                $parsedNextAppointmentDate->addDays($days)->lessThan($today) &&
                is_null($adverseOutcome->value)
            )
                $missedAppointments->push($patient);
        };

        return $missedAppointments;

    }
}
