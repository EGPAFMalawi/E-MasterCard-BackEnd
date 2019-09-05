<?php

namespace App\Modules\Priority\Reports\Processing\SubActions\DisaggregatedReports;

use App\Modules\Priority\Reports\Processing\Tasks\GetDisaggregatesTask;
use App\Modules\Priority\Reports\Processing\Tasks\GetLastVisitEncounterTask;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class GetTxCurrentDisAggReportSubAction
{
    public function run($reportDate)
    {
        $parsedReportDate = Carbon::parse($reportDate);
        ### STILL UNDER WORKS TO SORT BY VISIT DATE ######
        $lastVisitEncounterIDs = App::make(GetLastVisitEncounterTask::class)->run3($parsedReportDate);

        $eventsQuery = DB::table('visit_outcome_event')
                                ->whereIn('encounter_id', $lastVisitEncounterIDs)
                                ->whereNull('adverse_outcome')
                                ->whereNotNull('next_appointment_date')
                                ->whereDate('encounter_datetime', '<=', $parsedReportDate)
                                ->whereDate('next_appointment_date', '>', with(clone $parsedReportDate)->subDays(30));

        return App::make(GetDisaggregatesTask::class)->run($eventsQuery, $parsedReportDate);
    }
}
