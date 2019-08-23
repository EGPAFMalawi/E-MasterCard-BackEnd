<?php

namespace App\Modules\Priority\Reports\Processing\SubActions\DisaggregatedReports;

use App\Modules\Priority\Reports\Processing\Tasks\GetDisaggregatesTask;
use App\Modules\Priority\Reports\Processing\Tasks\GetLastRegistrationTask;
use App\Modules\Priority\Reports\Processing\Tasks\GetLastVisitEncounterTask;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class GetNewEnrollmentsDisAggReportSubAction
{
    public function run($reportStartDate, $reportEndDate, $type)
    {
        $parsedReportStartDate = Carbon::parse($reportStartDate);
        $parsedReportEndDate = Carbon::parse($reportEndDate);

        ### STILL UNDER WORKS TO SORT BY VISIT DATE ######
        $lastRegistrationEncounterIDs = App::make(GetLastRegistrationTask::class)->run();

        $eventsQuery = DB::table('clinic_registration')
                                ->whereIn('encounter_id', $lastRegistrationEncounterIDs)
                                ->whereNotNull('registration_type');

        if($type == 'TXNew')
            $eventsQuery->where('registration_type','First Time Initiation')->whereBetween('registration_art_start_date', [$parsedReportStartDate, $parsedReportEndDate]);
        elseif ($type == 'reInitiated')
            $eventsQuery->where('registration_type','Reinitiation')->whereBetween('registration_date', [$parsedReportStartDate, $parsedReportEndDate]);
        else
            $eventsQuery->where('registration_type','Transfer In')->whereBetween('registration_date', [$parsedReportStartDate, $parsedReportEndDate]);;

        return App::make(GetDisaggregatesTask::class)->run2($eventsQuery, $parsedReportEndDate, 'NewEnrollments');
    }
}
