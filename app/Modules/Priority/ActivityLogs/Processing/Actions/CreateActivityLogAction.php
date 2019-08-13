<?php

namespace App\Modules\Priority\ActivityLogs\Processing\Actions;

use App\Modules\Core\Users\Data\Models\User;
use App\Modules\Priority\ActivityLogs\Data\Repositories\ActivityLogRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;

class CreateActivityLogAction
{
    public function run($data, Model $model, $modelType)
    {
//        $user = Auth::user();
        $user = User::first();

        return  App::make(ActivityLogRepository::class)->create($data, $user, $model, $modelType);
    }
}
