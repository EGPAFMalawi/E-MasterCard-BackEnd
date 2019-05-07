<?php

namespace App\Modules\Core\Locations\Clients\API\Resources;

use Illuminate\Http\Resources\Json\Resource;

class LocationResource extends Resource
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
            'object' => 'LocationResource',
            'locationID' => $this->location_id,
            'name' => $this->name,
            'dateCreated' => $this->date_created
        ];
    }
}
