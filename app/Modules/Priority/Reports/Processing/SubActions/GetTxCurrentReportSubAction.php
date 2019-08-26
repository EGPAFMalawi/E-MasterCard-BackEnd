<?php

namespace App\Modules\Priority\Reports\Processing\SubActions;

use App\Modules\Core\Concepts\Concepts;
use App\Modules\Core\EncounterTypes\EncounterTypes;
use App\Modules\Core\Observations\Data\Models\Observation;
use App\Modules\Core\Patients\Data\Models\Patient;
use App\Modules\Core\Patients\Patients;
use App\Modules\Priority\Reports\Processing\Tasks\GetDefaultersTask;
use App\Modules\Priority\Reports\Processing\Tasks\GetLastVisitEncounterTask;
use App\Modules\Priority\Reports\Processing\Tasks\GetPatientsWithoutAdverseOutcomesTask;
use Carbon\Carbon;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class GetTxCurrentReportSubAction
{
    public function run(Collection $patients)
    {
        $defaulters = App::make(GetDefaultersTask::class)->run($patients);

        $encounterType = EncounterTypes::repository()->get(4);

        $patientsWithoutOutcome = $patients->filter(function ($patient) use ($encounterType){
            #Get Last Encounter
            $lastEncounter = App::make(GetLastVisitEncounterTask::class)->run($patient, $encounterType);

            if (is_null($lastEncounter))
                return false;

            #AdverseOutcome

            #Check if Past Today and if not Dead
            if (
            $patient->steps->where('step','Died')->count() == 0
            )
                return true;

            return false;
        });


        return [
            'PEPFARTXCurrent' => $patientsWithoutOutcome->diff($defaulters['PEPFARDefaulters']),
            'MOHTXCurrent' => $patientsWithoutOutcome->diff($defaulters['MOHDefaulters']),
        ];
    }

    public function run2($type)
    {
        if ($type == 'PEPFARTXCurrent')
            $days = 31;
        else
            $days = 61;


        ### STILL UNDER WORKS TO SORT BY VISIT DATE ######
        $lastVisitEncounters = App::make(GetLastVisitEncounterTask::class)->run2();

        $nextAppointmentDateObs = Observation::query()->whereIn('encounter_id', $lastVisitEncounters->pluck('encounter_id'))
            ->where('concept_id', 47)
            ->whereNotNull('value_datetime')
            ->whereDate('value_datetime', '>', Carbon::today()->subDays($days))
            ->get();

        $patients = Patient::whereIn('patient_id', $nextAppointmentDateObs->pluck('person_id'))->get();

        return App::make(GetPatientsWithoutAdverseOutcomesTask::class)->run($patients);
    }

    public function run3($type)
    {
        if ($type == 'PEPFARTXCurrent')
            $days = 31;
        else
            $days = 61;

        $parsedReportEndDate = Carbon::today();

        ### STILL UNDER WORKS TO SORT BY VISIT DATE ######
        $lastVisitEncounterIDs = App::make(GetLastVisitEncounterTask::class)->run3();

        $eventsQuery = DB::table('visit_outcome_event')
            ->whereIn('encounter_id', $lastVisitEncounterIDs)
            ->whereNull('adverse_outcome')
            ->whereNotNull('next_appointment_date')
            ->whereDate('next_appointment_date', '>=', $parsedReportEndDate->subDays($days));

        return Patient::whereIn('patient_id', $eventsQuery->pluck('person_id'))->get();
    }
}
