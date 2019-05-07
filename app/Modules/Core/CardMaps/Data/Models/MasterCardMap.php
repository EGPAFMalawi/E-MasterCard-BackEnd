<?php

namespace App\Modules\Core\CardMaps\Data\Models;

use App\Modules\Core\Concepts\Data\Models\Concept;
use App\Modules\Core\EncounterTypes\Data\Models\EncounterType;
use App\Modules\Core\MasterCards\Data\Models\MasterCard;
use Illuminate\Database\Eloquent\Model;

class MasterCardMap extends Model
{
    //
    protected $table = 'master_card_map';


    public function masterCard()
    {
        return $this->belongsTo(MasterCard::class, 'master_card_id');
    }

    public function encounterType()
    {
        return $this->belongsTo(EncounterType::class, 'encounter_type_id');
    }

    public function concept()
    {
        return $this->belongsTo(Concept::class, 'concept_id');
    }

}
