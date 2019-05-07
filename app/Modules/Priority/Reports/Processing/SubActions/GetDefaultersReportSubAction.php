<?php

namespace App\Modules\Priority\Reports\Processing\SubActions;

use App\Modules\Core\Patients\Patients;
use App\Modules\Priority\Reports\Processing\Tasks\GetDefaultersTask;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\App;

class GetDefaultersReportSubAction
{
    public function run(Collection $patients)
    {
        return App::make(GetDefaultersTask::class)->run($patients);
    }
}
