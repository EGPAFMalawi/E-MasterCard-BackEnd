<?php

namespace App\Modules\Priority\SystemBackups;

use App\Modules\Priority\SystemBackups\Clients\API\Resources\SystemBackupResource;
use App\Modules\Priority\SystemBackups\Data\Models\SystemBackup;
use App\Modules\Priority\SystemBackups\Data\Repositories\SystemBackupRepository;
use Illuminate\Support\Facades\App;

class SystemBackups{

    public static function repository()
    {
        return App::make(SystemBackupRepository::class);
    }

    public static function resource(SystemBackup $systemBackup)
    {
        return new SystemBackupResource($systemBackup);
    }

    public static function resourceCollection($systemBackup)
    {
        return SystemBackupResource::collection($systemBackup);
    }

}