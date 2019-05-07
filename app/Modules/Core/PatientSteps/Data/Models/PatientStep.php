<?php

namespace App\Modules\Core\PatientSteps\Data\Models;

use App\Modules\Core\Patients\Data\Models\Patient;
use Illuminate\Database\Eloquent\Model;

class PatientStep extends Model
{
    //
    protected $table = 'patient_step';
    protected $primaryKey = 'patient_step_id';

    public $timestamps = false;

    protected $fillable = ['art_number', 'date', 'site', 'origin_destination', 'step'];

    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id');
    }

    public function getRouteKey()
    {
        return 'patient_step_id';
    }

}
