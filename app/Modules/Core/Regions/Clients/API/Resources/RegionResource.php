<?php

namespace App\Modules\Core\Regions\Clients\API\Resources;

use Illuminate\Http\Resources\Json\Resource;

class RegionResource extends Resource
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
            'object' => 'RegionResource',
            'regionID' => $this->region_id,
            'name' => $this->name,
            'dateCreated' => $this->date_created
        ];
    }
}
