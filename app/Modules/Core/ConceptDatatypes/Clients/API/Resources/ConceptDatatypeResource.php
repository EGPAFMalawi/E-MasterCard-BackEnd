<?php

namespace App\Modules\Core\ConceptDatatypes\Clients\API\Resources;

use Illuminate\Http\Resources\Json\Resource;

class ConceptDatatypeResource extends Resource
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
            'object' => 'ConceptDatatype',
            'concept_datatype_id' => $this->concept_datatype_id,
            'name' => $this->name,
            'hl7_abbreviation' => $this->hl7_abbreviation,
            'description' => $this->description,
            'dateCreated' => $this->date_created,
            'uuid' => $this->uuid
        ];
    }
}
