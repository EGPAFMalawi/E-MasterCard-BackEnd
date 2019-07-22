<?php

namespace App\Modules\Priority\SystemBackups\Processing\Actions;

use App\Modules\Priority\SystemBackups\Data\Repositories\SystemBackupRepository;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;


class CreateSystemBackupAction
{
    public function run()
    {
        try {
            Artisan::call('backup:run');
            $output = Artisan::output();
            dd($output);
            //GET LAST BACKUP
            $disk = Storage::disk(config('backup.backup.destination.disks')[0]);
            $newFile = array_last($disk->files(config('backup.backup.name')));
            $data = [
                'name' => str_replace(config('backup.backup.name') . '/', '', $newFile),
                'path' => $newFile,
            ];

            return  App::make(SystemBackupRepository::class)->create($data);
        } catch (Exception $e)
        {
             abort(500, 'Error! Backup Procedure Failed.');
        }
    }
}
