<?php

namespace App\Modules\Core\Patients\Data\Models;

use App\Modules\Core\Encounters\Data\Models\Encounter;
use App\Modules\Core\Observations\Data\Models\Observation;
use App\Modules\Core\PatientCards\Data\Models\PatientCard;
use App\Modules\Core\PatientIdentifiers\Data\Models\PatientIdentifier;
use App\Modules\Core\PatientSteps\Data\Models\PatientStep;
use App\Modules\Core\Persons\Data\Models\Person;
use App\Modules\Priority\ActivityLogs\ActivityLogs;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    protected $table = 'patient';
    protected $primaryKey = 'patient_id';

    const CREATED_AT = 'date_created';
    const UPDATED_AT = null;

    public $incrementing = false;

    protected $fillable = ['guardian_name', 'patient_phone','guardian_phone', 'follow_up', 'guardian_relation'];

    public function person()
    {
        return $this->belongsTo(Person::class, 'patient_id');
    }

    public function encounters()
    {
        return $this->hasMany(Encounter::class, 'patient_id');
    }

    public function patientCards()
    {
        return $this->hasMany(PatientCard::class, 'patient_id');
    }

    public function observations()
    {
        return $this->hasMany(Observation::class, 'patient_id');
    }

    public function patientIdentifiers()
    {
        return $this->hasMany(PatientIdentifier::class, 'patient_id');
    }

    public function getArtNumberAttribute()
    {
        return $this->patientIdentifiers->last()?$this->patientIdentifiers->last()->identifier:null;
    }

//    public function getLastVisitDateAttribute()
//    {
//        $visitDateConcept = Concept::find(32);
//        $lastEncounter = $this->encounters->last();
//
//        $visitDate = $lastEncounter->observations->where('concept_id', $visitDateConcept->concept_id)->first();
//
//        return $visitDate?$visitDate->value:null;
//    }

    public function getRouteKey()
    {
        return 'patient_id';
    }

    public static function boot()
    {
        parent::boot();

        static::created(function ($instance) {
            ActivityLogs::create('Created','Patient created Successfully!',$instance, 'Patient');
        });

        static::updated(function ($instance) {
            ActivityLogs::create('Updated','Patient updated Successfully!',$instance, 'Patient');
        });
    }
}
