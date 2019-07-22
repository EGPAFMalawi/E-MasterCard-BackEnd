<?php

namespace App\Modules\Priority\SystemBackups\Data\Models;

use Illuminate\Database\Eloquent\Model;

class SystemBackup extends Model
{
    //
    protected $table = 'system_backup';
    protected $primaryKey = 'system_backup_id';

    protected $fillable = ['name', 'path'];

}
