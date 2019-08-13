<?php

namespace App\Modules\Priority\ActivityLogs\Processing\Actions;

use App\Modules\Priority\ActivityLogs\Data\Repositories\ActivityLogRepository;
use Illuminate\Support\Facades\App;

class GetAllActivityLogsAction
{
    public function run()
    {
        return App::make(ActivityLogRepository::class)->getAll();
    }
}
