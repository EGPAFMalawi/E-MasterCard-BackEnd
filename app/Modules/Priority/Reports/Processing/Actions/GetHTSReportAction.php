<?php

namespace App\Modules\Priority\Reports\Processing\Actions;

use App\Modules\Core\Patients\Patients;
use App\Modules\Priority\HTSRecords\HTSRecords;
use App\Modules\Priority\Reports\Processing\SubActions\GetDefaultersReportSubAction;
use App\Modules\Priority\Reports\Processing\SubActions\GetDueViralLoadReportSubAction;
use App\Modules\Priority\Reports\Processing\SubActions\GetEveryoneOnDTGReportSubAction;
use App\Modules\Priority\Reports\Processing\SubActions\GetHTSIndexReportSubAction;
use App\Modules\Priority\Reports\Processing\SubActions\GetHTSPITCInpatientReportSubAction;
use App\Modules\Priority\Reports\Processing\SubActions\GetHTSPITCLessThan5ReportSubAction;
use App\Modules\Priority\Reports\Processing\SubActions\GetHTSPITCMalnutritionReportSubAction;
use App\Modules\Priority\Reports\Processing\SubActions\GetHTSPITCOtherReportSubAction;
use App\Modules\Priority\Reports\Processing\SubActions\GetHTSVCTReportSubAction;
use App\Modules\Priority\Reports\Processing\SubActions\GetLastViralLoadReportSubAction;
use App\Modules\Priority\Reports\Processing\SubActions\GetMissedAppointmentsReportSubAction;
use App\Modules\Priority\Reports\Processing\SubActions\GetNextAppointmentTomorrowReportSubAction;
use App\Modules\Priority\Reports\Processing\SubActions\GetStepsReportSubAction;
use App\Modules\Priority\Reports\Processing\SubActions\GetTxCurrentReportSubAction;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class GetHTSReportAction
{
    public function run($data)
    {
        $query = DB::table('hts_record');

        $reportPayload = null;

        if ($data['code'] == 1)
            $reportPayload = App::make(GetHTSIndexReportSubAction::class)->run($query);
        elseif ($data['code'] == 2)
            $reportPayload = App::make(GetHTSVCTReportSubAction::class)->run($query);
        elseif ($data['code'] == 3)
            $reportPayload = App::make(GetHTSPITCInpatientReportSubAction::class)->run($query);
        elseif ($data['code'] == 4)
            $reportPayload = App::make(GetHTSPITCMalnutritionReportSubAction::class)->run($query);
        elseif ($data['code'] == 5)
            $reportPayload = App::make(GetHTSPITCLessThan5ReportSubAction::class)->run($query);
        elseif ($data['code'] == 6)
            $reportPayload = App::make(GetHTSPITCOtherReportSubAction::class)->run($query);

        return $reportPayload;
    }
}
