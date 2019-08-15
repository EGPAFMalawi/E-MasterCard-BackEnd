<?php

namespace App\Modules\Priority\Reports\Processing\DisaggregatedReports\SubActions;

use App\Modules\Priority\Reports\Processing\SubActions\GetDisaggregatesTask;
use App\Modules\Priority\Reports\Processing\Tasks\GetLastVisitEncounterTask;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class GetDefaultersReportSubAction
{
    public function run($reportDate, $type)
    {
        $parsedReportDate = Carbon::parse($reportDate);
        ### STILL UNDER WORKS TO SORT BY VISIT DATE ######
        $lastVisitEncounterIDs = App::make(GetLastVisitEncounterTask::class)->run3();

        $eventsQuery = DB::table('visit_outcome_event')
            ->whereIn('encounter_id', $lastVisitEncounterIDs)
            ->whereNull('adverse_outcome')
            ->whereNotNull('next_appointment_date');

        if ($type == '1Month')
            $eventsQuery->whereBetween('next_appointment_date', [$parsedReportDate->subDays(60),$parsedReportDate->subYears(30)]);
        elseif ($type == '2Months')
            $eventsQuery->whereBetween('next_appointment_date', [$parsedReportDate->subDays(90),$parsedReportDate->subYears(60)]);
        else
            $eventsQuery->whereDate('next_appointment_date','<', $parsedReportDate->subDays(90));

        return App::make(GetDisaggregatesTask::class)->run($eventsQuery, $parsedReportDate);
    }
}
