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

class GetDisaggregatedReportAction
{
    public function run($data)
    {

        $patients = Patients::repository()->getAll();

        $reportPayload = null;

        if ($data['code'] == 1)
        {
            $dueViralLoad = App::make(GetDueViralLoadReportSubAction::class)->run($patients);

            if ($data['type'] == 'TXCurrent')
                $disaggregatedReport = App::make(GetTXCurrentDisaggregatedReportSubAction::class)->run();
            elseif ($data['type'] == 'defaulted1Month')
                $disaggregatedReport = App::make(GetTXCurrentDisaggregatedReportSubAction::class)->run();
            elseif($data['type'] == 'defaulted2Months')
                $disaggregatedReport = App::make(GetTXCurrentDisaggregatedReportSubAction::class)->run();
            elseif($data['type'] == 'defaulted3MonthsPlus')
                $disaggregatedReport = App::make(GetTXCurrentDisaggregatedReportSubAction::class)->run();
            elseif($data['type'] == 'stopped')
                $disaggregatedReport = App::make(GetTXCurrentDisaggregatedReportSubAction::class)->run();
            elseif($data['type'] == 'transferredOut')
                $disaggregatedReport = App::make(GetTXCurrentDisaggregatedReportSubAction::class)->run();
            elseif($data['type'] == 'totalRegistered')
                $disaggregatedReport = App::make(GetTXCurrentDisaggregatedReportSubAction::class)->run();
            else
                $disaggregatedReport = App::make(GetTXCurrentDisaggregatedReportSubAction::class)->run();

        }elseif ($data['code'] == 2)
        {
            $nextAppointmentTomorrow = App::make(GetNextAppointmentTomorrowReportSubAction::class)->run2();
            $reportPayload = $nextAppointmentTomorrow;
        }elseif ($data['code'] == 3)
        {
            $missedAppointments = App::make(GetMissedAppointmentsReportSubAction::class)->run2();
            $reportPayload = $missedAppointments;
        }elseif ($data['code'] == 4)
        {
            $lastViralLoad = App::make(GetLastViralLoadReportSubAction::class)->run2();
            $reportPayload = $lastViralLoad;
        }

        return $reportPayload;
    }
}
