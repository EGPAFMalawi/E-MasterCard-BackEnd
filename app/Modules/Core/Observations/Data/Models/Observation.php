<?php

namespace App\Modules\Core\Observations\Data\Models;

use App\Modules\Core\Concepts\Data\Models\Concept;
use App\Modules\Core\Encounters\Data\Models\Encounter;
use App\Modules\Core\Persons\Data\Models\Person;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Observation extends Model
{
    //
    protected $table = 'obs';
    protected $primaryKey = 'obs_id';

    const CREATED_AT = 'date_created';
    const UPDATED_AT = null;

    public function encounter()
    {
        return $this->belongsTo(Encounter::class, 'encounter_id');
    }

    public function concept()
    {
        return $this->belongsTo(Concept::class, 'concept_id');
    }

    public function person()
    {
        return $this->belongsTo(Person::class, 'person_id');
    }

    public function getValueAttribute()
    {
        if ($this->concept->datatype->hl7_abbreviation == 'NM')
            $value = $this->value_numeric;
        elseif($this->concept->datatype->hl7_abbreviation == 'DT')
            $value = Carbon::parse($this->value_datetime)->format('Y-m-d');
        elseif($this->concept->datatype->hl7_abbreviation == 'ZZ')
            $value = $this->value_text;
        else
            $value = $this->value_text;

        return $value;
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($instance) {
            $instance->uuid = uuid4();
        });
    }

    public function getRouteKey()
    {
        return 'obs_id';
    }

}
