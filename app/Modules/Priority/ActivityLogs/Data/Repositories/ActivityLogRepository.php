<?php

namespace App\Modules\Priority\ActivityLogs\Data\Repositories;

use App\Modules\Core\Users\Data\Models\User;
use App\Modules\Priority\ActivityLogs\Data\Models\ActivityLog;
use Illuminate\Database\Eloquent\Model;


class ActivityLogRepository {

    public function getAll()
    {
        return ActivityLog::all();
    }

    public function get($id)
    {
        return ActivityLog::find($id);
    }

    public function getAllBy($field, $value)
    {
        return ActivityLog::where($field, $value)->get();
    }

    public function create($data, User $user, Model $model, $modelType)
    {
        $activityLog = new ActivityLog;
        $activityLog->fill($data);

        $activityLog->model_type = $modelType;
        if($activityLog->model_type == 'Patient')
            $activityLog->model_id = $model->patient_id;
        else
            $activityLog->model_id =  $model->encounter_id;

        $activityLog->user()->associate($user);

        $activityLog->save();

        return $activityLog;
    }
}