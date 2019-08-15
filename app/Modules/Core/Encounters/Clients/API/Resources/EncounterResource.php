<?php

namespace App\Modules\Core\Encounters\Clients\API\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\Resource;

class EncounterResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'object' => 'EncounterResource',
            'encounterID' => $this->encounter_id,
            'patient' => $this->patient,
            'encounterType' => $this->encounter_type,
            'encounterDatetime' => Carbon::parse($this->encounter_datetime)->format('d-m-Y'),
            'dateCreated' => $this->date_created,
            'voided' => $this->voided == 0?false:true,
            'uuid' => $this->uuid
        ];
    }
}
