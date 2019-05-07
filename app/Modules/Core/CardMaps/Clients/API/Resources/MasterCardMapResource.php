<?php

namespace App\Modules\Core\MasterCards\Clients\API\Resources;

use Illuminate\Http\Resources\Json\Resource;

class MasterCardResource extends Resource
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
            'object' => 'MasterCard',
            'masterCardID' => $this->master_card_id,
            'name' => $this->name,
            'version' => $this->version,
            'status' => $this->status,
            'encounterTypes' => EncounterTypeResource::collection($this->whenLoaded('encounterTypes')),
            'dateCreated' => $this->date_created,
            'uuid' => $this->uuid
        ];
    }
}
