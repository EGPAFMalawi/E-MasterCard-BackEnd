<?php

namespace App\Modules\Priority\Reports\Processing\Actions;

use App\Modules\Core\Patients\Patients;
use App\Modules\Priority\Reports\Processing\SubActions\GetDefaultersReportSubAction;
use App\Modules\Priority\Reports\Processing\SubActions\GetDueViralLoadReportSubAction;
use App\Modules\Priority\Reports\Processing\SubActions\GetEveryoneOnDTGReportSubAction;
use App\Modules\Priority\Reports\Processing\SubActions\GetLastViralLoadReportSubAction;
use App\Modules\Priority\Reports\Processing\SubActions\GetMissedAppointmentsReportSubAction;
use App\Modules\Priority\Reports\Processing\SubActions\GetNextAppointmentTomorrowReportSubAction;
use App\Modules\Priority\Reports\Processing\SubActions\GetStepsReportSubAction;
use App\Modules\Priority\Reports\Processing\SubActions\GetTxCurrentReportSubAction;
use Illuminate\Support\Facades\App;

class GetReportAction
{
    public function run($data)
    {
        $patients = Patients::repository()->getAll();
        //$patients = $patients->where('patient_id', 2);

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
            $nextAppointmentTomorrow = App::make(GetNextAppointmentTomorrowReportSubAction::class)->run($patients);
            $reportPayload = $nextAppointmentTomorrow;
        }elseif ($data['code'] == 3)
        {
            $missedAppointments = App::make(GetMissedAppointmentsReportSubAction::class)->run($patients);
            $reportPayload = $missedAppointments;
        }elseif ($data['code'] == 4)
        {
            $lastViralLoad = App::make(GetLastViralLoadReportSubAction::class)->run($patients);
            $reportPayload = $lastViralLoad;
        }elseif ($data['code'] == 5)
        {
            $everyoneOnDTG = App::make(GetEveryoneOnDTGReportSubAction::class)->run($patients);
            $reportPayload = $everyoneOnDTG;
        }elseif ($data['code'] == 6)
        {
            $defaulters = App::make(GetDefaultersReportSubAction::class)->run($patients);
            if ($data['type'] == 'PEPFARDefaulters')
                $reportPayload = $defaulters['PEPFARDefaulters'];
            else
                $reportPayload = $defaulters['MOHDefaulters'];

        }elseif ($data['code'] == 7)
        {
            $txCurrent = App::make(GetTxCurrentReportSubAction::class)->run($patients);

            if ($data['type'] == 'PEPFARTXCurrent')
                $reportPayload = $txCurrent['PEPFARTXCurrent'];
            else
                $reportPayload = $txCurrent['MOHTXCurrent'];
        }elseif ($data['code'] == 10)
        {
            $outcomes = App::make(GetStepsReportSubAction::class)->run($patients);

            if ($data['type'] == 'Died')
                $reportPayload = $outcomes['Died'];
            else if ($data['type'] == 'ARTStop')
                $reportPayload = $outcomes['ART Stop'];
            else if ($data['type'] == 'Trans-in')
                $reportPayload = $outcomes['Trans-in'];
            else if ($data['type'] == 'Trans-out')
                $reportPayload = $outcomes['Trans-out'];
            else
                $reportPayload = $outcomes['Restart'];
        }

        return $reportPayload;
    }
}
