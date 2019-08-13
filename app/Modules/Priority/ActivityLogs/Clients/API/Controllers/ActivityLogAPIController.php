<?php

namespace App\Modules\Priority\ActivityLogs\Clients\API\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Priority\ActivityLogs\Clients\API\Requests\StoreActivityLogRequest;
use App\Modules\Priority\ActivityLogs\Clients\API\Resources\ActivityLogResource;
use App\Modules\Priority\ActivityLogs\Data\Models\ActivityLog;
use App\Modules\Priority\ActivityLogs\Processing\Actions\DownloadActivityLogAction;
use App\Modules\Priority\ActivityLogs\Processing\Actions\GetAllActivityLogsAction;
use App\Modules\Priority\ActivityLogs\Processing\Actions\UpdateActivityLogAction;
use Illuminate\Support\Facades\App;

class ActivityLogAPIController extends  Controller
{
    public function getAll()
    {
        return ActivityLogResource::collection(App::make(GetAllActivityLogsAction::class)->run());
    }

    public function getAllForUser()
    {
        return ActivityLogResource::collection(App::make(GetAllActivityLogsAction::class)->run());
    }

    public function get(ActivityLog $activityLog)
    {
        return new ActivityLogResource($activityLog);
    }
}
