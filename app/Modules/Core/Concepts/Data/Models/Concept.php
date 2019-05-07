<?php

namespace App\Modules\Core\Concepts\Data\Models;

use App\Modules\Core\ConceptDatatypes\Data\Models\ConceptDatatype;
use App\Modules\Core\ConceptNames\Data\Models\ConceptName;
use App\Modules\Core\EncounterTypes\Data\Models\EncounterType;
use App\Modules\Core\MasterCards\Data\Models\MasterCard;
use Illuminate\Database\Eloquent\Model;

class Concept extends Model
{
    //
    protected $table = 'concept';
    protected $primaryKey = 'concept_id';

    const CREATED_AT = 'date_created';
    const UPDATED_AT = null;


    public function datatype()
    {
        return $this->belongsTo(ConceptDatatype::class, 'datatype_id');
    }

    public function name()
    {
        return $this->hasOne(ConceptName::class, 'concept_id');
    }

    public function encounterTypes()
    {
        return $this->belongsToMany(EncounterType::class, 'master_card_map', 'concept_id', 'encounter_type_id')
            ->distinct();
    }

    public function masterCard()
    {
        return $this->belongsToMany(MasterCard::class, 'master_card_map',  'concept_id', 'master_card_id')
            ->distinct();
    }

    public function masterCardMap()
    {
        return $this->hasMany(MasterCardMap::class, 'concept_id');
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
        return 'concept_id';
    }
}
