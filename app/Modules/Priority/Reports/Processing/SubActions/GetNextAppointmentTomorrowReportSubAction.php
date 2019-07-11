<?php

namespace App\Modules\Priority\Reports\Processing\SubActions;

use App\Modules\Core\Concepts\Concepts;
use App\Modules\Core\EncounterTypes\EncounterTypes;
use App\Modules\Core\Patients\Patients;
use App\Modules\Priority\Reports\Processing\Tasks\GetLastEncounterTask;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\App;

class GetNextAppointmentTomorrowReportSubAction
{
    public function run(Collection $patients)
    {
        $tomorrow = Carbon::tomorrow();
        $conceptRepo = Concepts::repository();

        $nextAppointmentDateConcept = $conceptRepo->get(47);

        $encounterType = EncounterTypes::repository()->get(4);

        $tomorrowsAppointments = collect();

        foreach ($patients as $patient)
        {
            #Get Last Encounter
            $lastEncounter = App::make(GetLastEncounterTask::class)->run($patient, $encounterType, 'NAPP');

            if (is_null($lastEncounter))
                continue;

            #Get ConceptObs
            #Next Appointment DateObs
            $nextAppointmentDate = $lastEncounter->observations->where('concept_id', $nextAppointmentDateConcept->concept_id)->last();

            #AdverseOutcome
            #Check if not Dead
            $adverseOutcome = $patient->steps->where('step','Died')->count();

            if (is_null($nextAppointmentDate->value))
                continue;

            #Check for Time
            $parsedNextAppointmentDate = Carbon::parse($nextAppointmentDate->value);

            #Check if Past Today and if not Dead
            if (
                $parsedNextAppointmentDate->equalTo($tomorrow)&&
                $adverseOutcome === 0
            )
                $tomorrowsAppointments->push($patient);
        };

        return $tomorrowsAppointments;
    }
}
