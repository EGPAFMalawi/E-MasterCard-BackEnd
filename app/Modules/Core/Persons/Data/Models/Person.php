<?php

namespace App\Modules\Core\Persons\Data\Models;

use App\Modules\Core\Observations\Data\Models\Observation;
use App\Modules\Core\Patients\Data\Models\Patient;
use App\Modules\Core\PersonAddresses\Data\Models\PersonAddress;
use App\Modules\Core\PersonNames\Data\Models\PersonName;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class Person extends Model
{
    protected $table = 'person';
    protected $primaryKey = 'person_id';

    const CREATED_AT = 'date_created';
    const UPDATED_AT = null;

    protected $fillable = ['gender', 'birthdate', 'birthdate_estimated'];

    public function patient()
    {
        return $this->hasOne(Patient::class, 'person_id');
    }

    public function names()
    {
        return $this->hasMany(PersonName::class, 'person_id');
    }

    public function addresses()
    {
        return $this->hasMany(PersonAddress::class, 'person_id');
    }

    public function observations()
    {
        return $this->hasMany(Observation::class, 'person_id');
    }

    public function getPreferredNameAttribute()
    {
        return $this->names->first();
    }

    public function getPreferredAddressAttribute()
    {
        return $this->addresses->first();
    }

    public function getOutcomeDetailsAttribute()
    {
        $events = DB::table('visit_outcome_event')->where('person_id', $this->person_id)->get();
        $lastOutcome = $events->last();

        if (!is_null($lastOutcome))
            if ($lastOutcome->adverse_outcome)
                return [
                    'outcome' => $lastOutcome->adverse_outcome,
                    'date' => $lastOutcome->encounter_datetime
                ];
        return null;
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($instance) {
            $instance->uuid = uuid4();
            $instance->creator = Auth::user()->user_id;
            $instance->date_created = Carbon::now();
        });

        static::updating(function ($instance) {
            $instance->changed_by = Auth::user()->user_id;
            $instance->date_changed = Carbon::now();
        });
    }

    public function getRouteKey()
    {
        return 'person_id';
    }
}
