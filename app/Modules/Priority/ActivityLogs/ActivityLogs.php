<?php

namespace App\Modules\Priority\ActivityLogs;

use App\Modules\Priority\ActivityLogs\Clients\API\Resources\ActivityLogResource;
use App\Modules\Priority\ActivityLogs\Data\Models\ActivityLog;
use App\Modules\Priority\ActivityLogs\Data\Repositories\ActivityLogRepository;
use App\Modules\Priority\ActivityLogs\Processing\Actions\CreateActivityLogAction;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class ActivityLogs{

    public static function repository()
    {
        return App::make(ActivityLogRepository::class);
    }

    public static function resource(ActivityLog $activityLog)
    {
        return new ActivityLogResource($activityLog);
    }

    public static function resourceCollection($activityLog)
    {
        return ActivityLogResource::collection($activityLog);
    }

    public static function create($logName, $description, Model $model, $modelType)
    {
        return App::make(CreateActivityLogAction::class)->run(['log_name' => $logName, 'description' => $description], $model, $modelType);
    }

}