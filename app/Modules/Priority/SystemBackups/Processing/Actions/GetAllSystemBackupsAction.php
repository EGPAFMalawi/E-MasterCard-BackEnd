<?php

namespace App\Modules\Priority\SystemBackups\Processing\Actions;

use App\Modules\Priority\SystemBackups\Data\Repositories\SystemBackupRepository;
use Illuminate\Support\Facades\App;

class GetAllSystemBackupsAction
{
    public function run()
    {
        return App::make(SystemBackupRepository::class)->getAll();
    }
}
