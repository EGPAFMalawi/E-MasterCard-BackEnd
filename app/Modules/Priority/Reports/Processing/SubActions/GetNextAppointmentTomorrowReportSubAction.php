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
            $lastEncounter = App::make(GetLastVisitEncounterTask::class)->run($patient, $encounterType, 'NAPP');

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

    public function run2()
    {
        ### STILL UNDER WORKS TO SORT BY VISIT DATE ######
        $lastVisitEncounters = App::make(GetLastVisitEncounterTask::class)->run2();

        $nextAppointmentDateObs = Observation::query()->whereIn('encounter_id', $lastVisitEncounters->pluck('encounter_id'))
            ->where('concept_id', 47)
            ->whereNotNull('value_datetime')
            ->whereDate('value_datetime', Carbon::tomorrow())
            ->get();

        $patients = Patient::whereIn('patient_id', $nextAppointmentDateObs->pluck('person_id'))->get();

        return App::make(GetPatientsWithoutAdverseOutcomesTask::class)->run($patients);
    }
}
