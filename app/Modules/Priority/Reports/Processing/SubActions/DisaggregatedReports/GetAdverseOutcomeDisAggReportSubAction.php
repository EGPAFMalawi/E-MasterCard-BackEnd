<?php

namespace App\Modules\Priority\Reports\Processing\SubActions\DisaggregatedReports;

use App\Modules\Priority\Reports\Processing\Tasks\GetDisaggregatesTask;
use App\Modules\Priority\Reports\Processing\Tasks\GetLastVisitEncounterTask;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class GetAdverseOutcomeDisAggReportSubAction
{
    public function run($reportDate, $type)
    {
        $parsedReportDate = Carbon::parse($reportDate);
        ### STILL UNDER WORKS TO SORT BY VISIT DATE ######
        $lastVisitEncounterIDs = App::make(GetLastVisitEncounterTask::class)->run3($parsedReportDate);

        $eventsQuery = DB::table('visit_outcome_event')
            ->whereIn('encounter_id', $lastVisitEncounterIDs)
            ->whereNotNull('adverse_outcome')
            ->whereNotNull('encounter_datetime');

        if ($type == 'stopped')
            $eventsQuery->where('adverse_outcome','Stop');
        elseif ($type == 'died')
            $eventsQuery->where('adverse_outcome','D');
        else
            $eventsQuery->where('adverse_outcome','To');

        $eventsQuery->whereDate('encounter_datetime','<=',$parsedReportDate);

        return App::make(GetDisaggregatesTask::class)->run($eventsQuery, $parsedReportDate);
    }

    public function run2($reportStartDate, $reportEndDate, $type)
    {
        $parsedReportStartDate = Carbon::parse($reportStartDate);
        $parsedReportEndDate = Carbon::parse($reportEndDate);

        ### STILL UNDER WORKS TO SORT BY VISIT DATE ######
        $lastVisitEncounterIDs = App::make(GetLastVisitEncounterTask::class)->run3($parsedReportEndDate);

        $eventsQuery = DB::table('visit_outcome_event')
            ->whereIn('encounter_id', $lastVisitEncounterIDs)
            ->whereNotNull('adverse_outcome')
            ->whereNotNull('encounter_datetime');

        if ($type == 'stopped')
            $eventsQuery->where('adverse_outcome','Stop');
        elseif ($type == 'died')
            $eventsQuery->where('adverse_outcome','D');
        else
            $eventsQuery->where('adverse_outcome','To');

        $eventsQuery->whereBetween('encounter_datetime',[$parsedReportStartDate, $parsedReportEndDate]);

        return App::make(GetDisaggregatesTask::class)->run2($eventsQuery, $parsedReportEndDate, 'AdverseOutcomes');
    }
}
