<?php

namespace App\Modules\Core\PatientIdentifierTypes\Clients\API\Resources;

use App\Modules\Core\Concepts\Concepts;
use Illuminate\Http\Resources\Json\Resource;

class PatientIdentifierTypeResource extends Resource
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
            'object' => 'PatientIdentifierTypeResource',
            'patientIdentifierTypeID' => $this->patient_identifier_type_id,
            'name' => $this->name,
            'description' => $this->description,
            'concepts' => Concepts::resourceCollection($this->whenLoaded('concepts')),
            'dateCreated' => $this->date_created,
            'uuid' => $this->uuid
        ];
    }
}
