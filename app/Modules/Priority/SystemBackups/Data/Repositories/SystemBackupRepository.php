<?php

namespace App\Modules\Priority\SystemBackups\Data\Repositories;

use App\Modules\Priority\SystemBackups\Data\Models\SystemBackup;


class SystemBackupRepository {

    public function getAll()
    {
        return SystemBackup::all();
    }

    public function get($id)
    {
        return SystemBackup::find($id);
    }


    public function create($data)
    {
        $systemBackup = new SystemBackup;
        $systemBackup->fill($data);

        $systemBackup->save();

        return $systemBackup;
    }
}