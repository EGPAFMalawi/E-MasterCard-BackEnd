<?php

namespace App\Modules\Priority\Reports\Processing\DisaggregatedReports\SubActions;

use App\Modules\Priority\Reports\Processing\SubActions\GetDisaggregatesTask;
use App\Modules\Priority\Reports\Processing\Tasks\GetLastVisitEncounterTask;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class GetTxCurrentReportSubAction
{
    public function run($reportDate)
    {
        $parsedReportDate = Carbon::parse($reportDate);
        ### STILL UNDER WORKS TO SORT BY VISIT DATE ######
        $lastVisitEncounterIDs = App::make(GetLastVisitEncounterTask::class)->run3();

        $eventsQuery = DB::table('visit_outcome_event')
                                ->whereIn('encounter_id', $lastVisitEncounterIDs)
                                ->whereNull('adverse_outcome')
                                ->whereNotNull('next_appointment_date')
                                ->whereDate('next_appointment_date', '>', $parsedReportDate->subDays(30));

        return App::make(GetDisaggregatesTask::class)->run($eventsQuery, $parsedReportDate);
    }
}
