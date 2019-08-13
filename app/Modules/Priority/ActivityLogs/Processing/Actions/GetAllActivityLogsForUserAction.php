<?php

namespace App\Modules\Priority\ActivityLogs\Processing\Actions;

use App\Modules\Core\Users\Data\Models\User;
use App\Modules\Priority\ActivityLogs\Data\Repositories\ActivityLogRepository;
use Illuminate\Support\Facades\App;

class GetAllActivityLogsForUserAction
{
    public function run(User $user)
    {
        return App::make(ActivityLogRepository::class)->getAllBy('user_id', $user->user_id);
    }
}
