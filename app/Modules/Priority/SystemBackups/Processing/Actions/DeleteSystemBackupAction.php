<?php

namespace App\Modules\Priority\SystemBackups\Processing\Actions;

use App\Modules\Priority\SystemBackups\Data\Models\SystemBackup;
use App\Modules\Priority\SystemBackups\Data\Repositories\SystemBackupRepository;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Storage;


class DeleteSystemBackupAction
{
    public function run(SystemBackup $systemBackup)
    {
        $disk = Storage::disk(config('backup.backup.destination.disks')[0]);

        if ($disk->exists(config('backup.backup.name') . '/' . $systemBackup->name)) {
            $disk->delete(config('backup.backup.name') . '/' . $systemBackup->name);
            $systemBackup->delete();
            return true;
        } else {
            abort(404, "The backup file doesn't exist.");
        }
    }
}
