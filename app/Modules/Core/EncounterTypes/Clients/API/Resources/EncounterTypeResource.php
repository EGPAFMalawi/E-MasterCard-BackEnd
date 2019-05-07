<?php

namespace App\Modules\Core\EncounterTypes\Clients\API\Resources;

use App\Modules\Core\Concepts\Concepts;
use Illuminate\Http\Resources\Json\Resource;

class EncounterTypeResource extends Resource
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
            'object' => 'EncounterTypeResource',
            'encounterTypeID' => $this->encounter_type_id,
            'name' => $this->name,
            'description' => $this->description,
            'concepts' => Concepts::resourceCollection($this->whenLoaded('concepts')),
            'dateCreated' => $this->date_created,
            'uuid' => $this->uuid
        ];
    }
}
