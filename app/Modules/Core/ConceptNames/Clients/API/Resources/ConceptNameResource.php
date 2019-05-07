<?php

namespace App\Modules\Core\ConceptNames\Clients\API\Resources;

use Illuminate\Http\Resources\Json\Resource;

class ConceptNameResource extends Resource
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
            'object' => 'ConceptName',
            'conceptNameID' => $this->concept_name_id,
            'name' => $this->name,
            'dateCreated' => $this->date_created,
            'uuid' => $this->uuid
        ];
    }
}
