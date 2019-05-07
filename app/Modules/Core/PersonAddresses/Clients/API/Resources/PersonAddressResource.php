<?php

namespace App\Modules\Core\PersonAddresses\Clients\API\Resources;

use Illuminate\Http\Resources\Json\Resource;

class PersonAddressResource extends Resource
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
            'object' => 'PersonAddress',
            'personAddressID' => $this->master_card_id,
            'cityVillage' => $this->city_village,
            'countyDistrict' => $this->county_district,
            'region' => $this->region,
            'townshipDivision' => $this->township_division,
        ];
    }
}
