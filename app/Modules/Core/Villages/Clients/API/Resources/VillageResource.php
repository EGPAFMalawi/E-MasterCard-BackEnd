<?php

namespace App\Modules\Core\Villages\Clients\API\Resources;

use App\Modules\Core\TraditionalAuthorities\TraditionalAuthorities;
use Illuminate\Http\Resources\Json\Resource;

class VillageResource extends Resource
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
            'object' => 'VillageResource',
            'villageID' => $this->village_id,
            'name' => $this->name,
            'traditionalAuthority' => TraditionalAuthorities::resource($this->traditionalAuthority),
            'dateCreated' => $this->date_created
        ];
    }
}
