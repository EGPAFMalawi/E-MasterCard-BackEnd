<?php

namespace App\Modules\Priority\Reports\Processing\SubActions;

use App\Modules\Core\Concepts\Concepts;
use App\Modules\Core\Encounters\Data\Models\PatientIdentifier;
use App\Modules\Core\EncounterTypes\EncounterTypes;
use App\Modules\Core\Observations\Data\Models\Observation;
use App\Modules\Core\PatientCards\Data\Models\PatientCard;
use App\Modules\Core\Patients\Data\Models\Patient;
use App\Modules\Core\Patients\Patients;
use App\Modules\Core\PatientSteps\Data\Models\PatientStep;
use App\Modules\Priority\Reports\Processing\Tasks\GetDefaultersTask;
use App\Modules\Priority\Reports\Processing\Tasks\GetLastVisitEncounterTask;
use App\Modules\Priority\Reports\Processing\Tasks\GetPatientsWithoutAdverseOutcomesTask;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class GetStepsReportSubAction
{
    public function run(Collection $patients)
    {
        $ARTStop = collect();
        $Died = collect();
        $TransIn = collect();
        $TransOut= collect();
        $Restart = collect();

        foreach ($patients as $patient)
        {
            $lastStep = $patient->steps->last();

            if ($lastStep !== null)
            {
                if ($lastStep->step == 'ART Stop')
                    $ARTStop->push($patient);
                elseif ($lastStep->step == 'Died')
                    $Died->push($patient);
                elseif ($lastStep->step == 'Trans-in')
                    $TransIn->push($patient);
                elseif ($lastStep->step == 'Trans-out')
                    $TransOut->push($patient);
                elseif ($lastStep->step == 'Restart')
                    $Restart->push($patient);
            }
        }

        return [
                'ART Stop' => $ARTStop,
                'Died' => $Died,
                'Trans-in' => $TransIn,
                'Trans-out' => $TransOut,
                'Restart' => $Restart,
        ];
    }

    public function run2($type)
    {

        $groupedPatientSteps = PatientStep::all()->groupBy('patient_id');
        $lastPatientSteps = $groupedPatientSteps->map(function ($items){
            return $items->where('voided', 0)->sortBy('patient_id')->last();
        });

        if ($type == 'Died')
            $field = 'Died';
        else if ($type == 'ARTStop')
            $field = 'ART Stop';
        else if ($type == 'Trans-in')
            $field = 'Trans-in';
        else if ($type == 'Trans-out')
            $field = 'Trans-out';
        else
            $field = 'Restart';
        
        return  PatientStep::query()->whereIn('patient_step_id', $lastPatientSteps->pluck('patient_step_id'))
            ->where('step', $field)
            ->get();
    }

    public function run3($type)
    {

        $lastVisitEncounterIDs = App::make(GetLastVisitEncounterTask::class)->run3();

        $eventsQuery = DB::table('visit_outcome_event')
            ->whereIn('encounter_id', $lastVisitEncounterIDs)
            ->whereNotNull('adverse_outcome')
            ->whereNotNull('encounter_datetime');

        if ($type == 'Stopped')
            $eventsQuery->where('adverse_outcome','Stop');
        elseif ($type == 'Died')
            $eventsQuery->where('adverse_outcome','D');
        else
            $eventsQuery->where('adverse_outcome','To');

        $eventsQuery->get();

        return Patient::whereIn('patient_id', $eventsQuery->pluck('person_id'))->get();
    }
}
