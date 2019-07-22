<?php

namespace App\Modules\Priority\SystemBackups\Processing\Actions;

use App\Modules\Priority\SystemBackups\Data\Models\SystemBackup;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

class DownloadSystemBackupAction
{
    public function run(SystemBackup $systemBackup)
    {
        $disk = Storage::disk(config('backup.backup.destination.disks')[0]);

        if ($disk->exists($systemBackup->path)) {

            $fs = Storage::disk(config('backup.backup.destination.disks')[0])->getDriver();
            $stream = $fs->readStream($systemBackup->path);

            return response()->stream(function () use ($stream) {
                fpassthru($stream);
            }, 200, [
                "Content-Type" => $fs->getMimetype($systemBackup->path),
                "Content-Length" => $fs->getSize($systemBackup->path),
                "Content-disposition" => "attachment; filename=\"" . basename($systemBackup->path) . "\"",
            ]);
        } else {
            abort(404, "Error! The Backup File wasn't Found.");
        }
    }
}
