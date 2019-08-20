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
use Illuminate\Support\Facades\DB;


class GetMissedAppointmentsReportSubAction
{
    public function run(Collection $patients, $days = 14)
    {
        $today = Carbon::today();
        $conceptRepo = Concepts::repository();

        $nextAppointmentDateConcept = $conceptRepo->get(47);

        $encounterType = EncounterTypes::repository()->get(4);

        $missedAppointments = collect();

        foreach ($patients as $patient)
        {
            #Get Last Encounter
            $lastEncounter = App::make(GetLastVisitEncounterTask::class)->run($patient, $encounterType);

            if (is_null($lastEncounter))
                continue;

            #Get ConceptObs
            #Next Appointment DateObs
            $nextAppointmentDate = $lastEncounter->observations->where('concept_id', $nextAppointmentDateConcept->concept_id)->first();

            #AdverseOutcome
            $adverseOutcome = $patient->steps->where('step','Died')->count();

            if (is_null($nextAppointmentDate))
                continue;

            if (is_null($nextAppointmentDate->value))
                continue;

            #Check for Time
            $parsedNextAppointmentDate = Carbon::parse($nextAppointmentDate->value);

            #Check if Past Today and if not Dead
            if (
                $parsedNextAppointmentDate->addDays($days)->lessThan($today) &&
                $adverseOutcome === 0
            )
                $missedAppointments->push($patient);
        };

        return $missedAppointments;

    }

    public function run2($days = 14)
    {
        ### STILL UNDER WORKS TO SORT BY VISIT DATE ######
        $lastVisitEncounters = App::make(GetLastVisitEncounterTask::class)->run2();

        $nextAppointmentDateObs = Observation::query()->whereIn('encounter_id', $lastVisitEncounters->pluck('encounter_id'))
            ->where('concept_id', 47)
            ->whereNotNull('value_datetime')
            ->whereDate('value_datetime', '<', Carbon::today()->subDays($days))
            ->get();

        $patients = Patient::whereIn('patient_id', $nextAppointmentDateObs->pluck('person_id'))->get();

        return App::make(GetPatientsWithoutAdverseOutcomesTask::class)->run($patients);
    }

    public function run3($days = 14)
    {
        $parsedReportEndDate = Carbon::today();

        ### STILL UNDER WORKS TO SORT BY VISIT DATE ######
        $lastVisitEncounterIDs = App::make(GetLastVisitEncounterTask::class)->run3();

        $eventsQuery = DB::table('visit_outcome_event')
            ->whereIn('encounter_id', $lastVisitEncounterIDs)
            ->whereNull('adverse_outcome')
            ->whereNotNull('next_appointment_date')
            ->whereDate('next_appointment_date','<', $parsedReportEndDate->subDays($days))
            ->get();

        return Patient::whereIn('patient_id', $eventsQuery->pluck('person_id'))->get();
    }
}
