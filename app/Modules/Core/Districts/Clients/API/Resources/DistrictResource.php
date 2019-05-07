<?php

namespace App\Modules\Core\Districts\Clients\API\Resources;

use App\Modules\Core\Regions\Regions;
use Illuminate\Http\Resources\Json\Resource;

class DistrictResource extends Resource
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
            'object' => 'DistrictResource',
            'districtID' => $this->district_id,
            'name' => $this->name,
            'region' => Regions::resource($this->region),
            'dateCreated' => $this->date_created
        ];
    }
}
