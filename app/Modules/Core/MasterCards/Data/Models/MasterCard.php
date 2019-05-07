<?php

namespace App\Modules\Core\MasterCards\Data\Models;

use App\Modules\Core\CardMaps\Data\Models\MasterCardMap;
use App\Modules\Core\Concepts\Data\Models\Concept;
use App\Modules\Core\EncounterTypes\Data\Models\EncounterType;
use App\Modules\Core\PatientCards\Data\Models\PatientCard;
use Illuminate\Database\Eloquent\Model;

class MasterCard extends Model
{
    //
    protected $table = 'master_card';
    protected $primaryKey = 'master_card_id';

    const CREATED_AT = 'date_created';
    const UPDATED_AT = null;

    public function patientCards()
    {
        return $this->hasMany(PatientCard::class, 'patient_card_id');
    }

    public function encounterTypes()
    {
        return $this->belongsToMany(EncounterType::class, 'master_card_map', 'master_card_id', 'encounter_type_id')
            ->distinct();
    }

    public function concepts()
    {
        return $this->belongsToMany(Concept::class, 'master_card_map','master_card_id', 'concept_id')
            ->distinct();
    }

    public function masterCardMap()
    {
        return $this->hasMany(MasterCardMap::class, 'master_card_id');
    }

    public function getNameAttribute()
    {
        return 'Version '.$this->version;
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
        return 'master_card_id';
    }

}
