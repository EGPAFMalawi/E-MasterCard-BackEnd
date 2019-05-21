<?php

namespace App\Modules\Core\Facilities\Clients\API\Resources;

use App\Modules\Core\Districts\Districts;
use Illuminate\Http\Resources\Json\Resource;

class FacilityResource extends Resource
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
            'object' => 'FacilityResource',
            'facilityID' => $this->facility_id,
            'name' => $this->name,
            'code' => $this->code,
            'district' => Districts::resource($this->district),
            'dateCreated' => $this->date_created
        ];
    }
}
