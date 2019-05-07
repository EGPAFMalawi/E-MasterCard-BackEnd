<?php

namespace App\Modules\Core\EncounterTypes\Data\Models;

use App\Modules\Core\CardMaps\Data\Models\MasterCardMap;
use App\Modules\Core\Concepts\Data\Models\Concept;
use App\Modules\Core\Encounters\Data\Models\Encounter;
use App\Modules\Core\MasterCards\Data\Models\MasterCard;
use Illuminate\Database\Eloquent\Model;

class EncounterType extends Model
{
    protected $table = 'encounter_type';
    protected $primaryKey = 'encounter_type_id';

    const CREATED_AT = 'date_created';
    const UPDATED_AT = null;


    public function encounters()
    {
        return $this->hasMany(Encounter::class, 'encounter_type');
    }

    public function masterCards()
    {
        return $this->belongsToMany(MasterCard::class, 'master_card_map','encounter_type_id', 'master_card_id')
            ->distinct();
    }

    public function concepts()
    {
        return $this->belongsToMany(Concept::class, 'master_card_map', 'encounter_type_id', 'concept_id')
            ->distinct();
    }

    public function masterCardMap()
    {
        return $this->hasMany(MasterCardMap::class, 'encounter_type_id');
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
        return 'encounter_type_id';
    }

}
