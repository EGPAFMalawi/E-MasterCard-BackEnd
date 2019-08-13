<?php

namespace App\Modules\Priority\ActivityLogs\Data\Models;

use App\Modules\Core\Encounters\Encounters;
use App\Modules\Core\Patients\Patients;
use App\Modules\Core\Users\Data\Models\User;
use Illuminate\Database\Eloquent\Model;

class ActivityLog extends Model
{
    //
    protected $table = 'activity_log';
    protected $primaryKey = 'activity_log_id';

    protected $fillable = ['log_name', 'description', 'properties'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function getActualModelAttribute()
    {
        return $this->model_type == 'Patient'?Patients::repository()->get($this->model_id):Encounters::repository()->get($this->model_id);
    }

}
