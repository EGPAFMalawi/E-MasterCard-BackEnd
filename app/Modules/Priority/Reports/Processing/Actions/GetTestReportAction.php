<?php

namespace App\Modules\Priority\Reports\Processing\Actions;

use App\Modules\Core\Observations\Data\Models\Observation;
use App\Modules\Core\Patients\Data\Models\Patient;
use App\Modules\Core\Patients\Patients;
use App\Modules\Priority\Reports\Processing\SubActions\GetDefaultersReportSubAction;
use App\Modules\Priority\Reports\Processing\SubActions\GetDueViralLoadReportSubAction;
use App\Modules\Priority\Reports\Processing\SubActions\GetEveryoneOnDTGReportSubAction;
use App\Modules\Priority\Reports\Processing\SubActions\GetLastViralLoadReportSubAction;
use App\Modules\Priority\Reports\Processing\SubActions\GetMissedAppointmentsReportSubAction;
use App\Modules\Priority\Reports\Processing\SubActions\GetNextAppointmentTomorrowReportSubAction;
use App\Modules\Priority\Reports\Processing\SubActions\GetStepsReportSubAction;
use App\Modules\Priority\Reports\Processing\SubActions\GetTxCurrentReportSubAction;
use App\Modules\Priority\Reports\Processing\Tasks\GetLastVisitEncounterTask;
use App\Modules\Priority\Reports\Processing\Tasks\GetPatientsWithoutAdverseOutcomesTask;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;

class GetTestReportAction
{
    public function run($data)
    {

        $patients = Patients::repository()->getAll();

        $reportPayload = null;

        if ($data['code'] == 1)
        {
            $dueViralLoad = App::make(GetDueViralLoadReportSubAction::class)->run($patients);

            if ($data['type'] == 'due6Months')
                $reportPayload = $dueViralLoad['due6Months'];
            elseif ($data['type'] == 'due12Months')
                $reportPayload = $dueViralLoad['due12Months'];
            else
                $reportPayload = $dueViralLoad['dueAfter12Months'];
        }elseif ($data['code'] == 2)
        {
            $nextAppointmentTomorrow = App::make(GetNextAppointmentTomorrowReportSubAction::class)->run3();
            $reportPayload = $nextAppointmentTomorrow;
        }elseif ($data['code'] == 3)
        {
            $missedAppointments = App::make(GetMissedAppointmentsReportSubAction::class)->run3();
            $reportPayload = $missedAppointments;
        }elseif ($data['code'] == 4)
        {
            $lastViralLoad = App::make(GetLastViralLoadReportSubAction::class)->run3();
            $reportPayload = $lastViralLoad;
        }elseif ($data['code'] == 5)
        {
            $everyoneOnDTG = App::make(GetEveryoneOnDTGReportSubAction::class)->run3();
            $reportPayload = $everyoneOnDTG;
        }elseif ($data['code'] == 6)
        {
            $defaulters = App::make(GetDefaultersReportSubAction::class)->run3($data['type']);
            $reportPayload = $defaulters;
        }elseif ($data['code'] == 7)
        {
            $txCurrent = App::make(GetTxCurrentReportSubAction::class)->run3($data['type']);
            $reportPayload = $txCurrent;
        }elseif ($data['code'] == 10)
        {
            $outcomes = App::make(GetStepsReportSubAction::class)->run3($data['type']);
            $reportPayload = $outcomes;
        }

        return $reportPayload;
    }
}
