<?php

namespace App\Modules\Priority\Reports\Processing\Tasks;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class GetLastRegistrationTask
{
    public function run(Carbon $parsedStartReportDate, Carbon $parsedEndReportDate)
    {
        $groupedEncounters = DB::table('clinic_registration')->whereBetween('registration_date', [$parsedStartReportDate, $parsedEndReportDate])->where('voided',0)->get()->groupBy('person_id');

        $lastRegistrationEncounterIDs = $groupedEncounters->map(function ($items){
            return $items->sortBy('encounter_datetime')->last();
        })
        ->pluck('encounter_id');

        return $lastRegistrationEncounterIDs;
    }
}
