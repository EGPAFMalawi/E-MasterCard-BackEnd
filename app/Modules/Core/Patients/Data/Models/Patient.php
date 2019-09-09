<?php

namespace App\Modules\Core\Patients\Data\Models;

use App\Modules\Core\Encounters\Data\Models\Encounter;
use App\Modules\Core\Observations\Data\Models\Observation;
use App\Modules\Core\PatientCards\Data\Models\PatientCard;
use App\Modules\Core\PatientIdentifiers\Data\Models\PatientIdentifier;
use App\Modules\Core\Persons\Data\Models\Person;
use App\Modules\Priority\ActivityLogs\ActivityLogs;
use App\Modules\Priority\Settings\Settings;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Patient extends Model
{
    protected $table = 'patient';
    protected $primaryKey = 'patient_id';

    const CREATED_AT = 'date_created';
    const UPDATED_AT = null;

    public $incrementing = false;

    protected $fillable = ['guardian_name', 'patient_phone','guardian_phone', 'follow_up', 'guardian_relation', 'soldier'];

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

    public function getFullArtNumberAttribute()
    {
        $identifier = $this->patientIdentifiers->last()?$this->patientIdentifiers->last()->identifier:null;

        if(!is_null($identifier))
        {
            $identifier = Settings::repository()->get(1)->options['code'].$identifier;
        }
        return $identifier;
    }

    public function getArtNumberAttribute()
    {
        $identifier = $this->patientIdentifiers->last()?$this->patientIdentifiers->last()->identifier:null;

        return $identifier;
    }

    public function getPatientIdentifierIDAttribute()
    {
        $identifierID = $this->patientIdentifiers->last()?$this->patientIdentifiers->last()->patient_identifier_id:null;

        return $identifierID;
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

        static::creating(function ($instance) {
            $instance->creator = Auth::user()->user_id;
            $instance->date_created = Carbon::now();
        });

        static::updating(function ($instance) {
            $instance->changed_by = Auth::user()->user_id;
            $instance->date_changed = Carbon::now();
        });

        static::created(function ($instance) {
            ActivityLogs::create('Created','Patient created Successfully!',$instance, 'Patient');
        });

        static::updated(function ($instance) {
            ActivityLogs::create('Updated','Patient updated Successfully!',$instance, 'Patient');
        });
    }
}
