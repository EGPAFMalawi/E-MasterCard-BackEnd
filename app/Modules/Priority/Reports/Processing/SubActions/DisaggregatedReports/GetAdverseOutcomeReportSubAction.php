<?php

namespace App\Modules\Priority\Reports\Processing\DisaggregatedReports\SubActions;

use App\Modules\Priority\Reports\Processing\SubActions\GetDisaggregatesTask;
use App\Modules\Priority\Reports\Processing\Tasks\GetLastVisitEncounterTask;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class GetAdverseOutcomeReportSubAction
{
    public function run($reportDate, $type)
    {
        $parsedReportDate = Carbon::parse($reportDate);
        ### STILL UNDER WORKS TO SORT BY VISIT DATE ######
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

        $eventsQuery->whereDate('encounter_datetime','<=',$parsedReportDate);

        return App::make(GetDisaggregatesTask::class)->run($eventsQuery, $parsedReportDate);
    }
}
