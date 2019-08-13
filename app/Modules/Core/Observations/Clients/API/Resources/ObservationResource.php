<?php

namespace App\Modules\Core\Observations\Clients\API\Resources;

use App\Modules\Core\Concepts\Concepts;
use App\Modules\Core\Encounters\Encounter;
use App\Modules\Core\Encounters\Encounters;
use Illuminate\Http\Resources\Json\Resource;

class ObservationResource extends Resource
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
            'object' => 'ObservationResource',
            'observationID' => $this->obs_id,
            'patientID' => $this->patient_id,
            'person' => $this->person,
            'concept' => Concepts::resource($this->concept),
            'encounter' => Encounters::resource($this->encounter),
            'obsDatetime' => $this->obs_datetime,
            'value' => $this->value,
            'dateCreated' => (string)$this->date_created,
            'uuid' => $this->uuid
        ];
    }
}
