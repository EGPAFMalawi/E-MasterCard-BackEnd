<?php

namespace App\Modules\Priority\SystemBackups\Clients\API\Controllers;

use App\Http\Controllers\Controller;

use App\Modules\Priority\SystemBackups\Clients\API\Requests\StoreSystemBackupRequest;
use App\Modules\Priority\SystemBackups\Clients\API\Resources\SystemBackupResource;
use App\Modules\Priority\SystemBackups\Data\Models\SystemBackup;
use App\Modules\Priority\SystemBackups\Processing\Actions\CreateSystemBackupAction;
use App\Modules\Priority\SystemBackups\Processing\Actions\DownloadSystemBackupAction;
use App\Modules\Priority\SystemBackups\Processing\Actions\GetAllSystemBackupsAction;
use App\Modules\Priority\SystemBackups\Processing\Actions\UpdateSystemBackupAction;
use Illuminate\Support\Facades\App;

class SystemBackupAPIController extends  Controller
{
    public function getAll()
    {
        return SystemBackupResource::collection(App::make(GetAllSystemBackupsAction::class)->run());
    }

    public function store(StoreSystemBackupRequest $request)
    {
        return new SystemBackupResource(App::make(CreateSystemBackupAction::class)->run($request->all()));
    }

    public function download(SystemBackup $systemBackup)
    {
        return App::make(DownloadSystemBackupAction::class)->run($systemBackup);
    }
}
