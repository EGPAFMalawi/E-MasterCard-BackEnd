<?php

namespace App\Modules\Core\TraditionalAuthorities\Clients\API\Resources;

use App\Modules\Core\Districts\Districts;
use Illuminate\Http\Resources\Json\Resource;

class TraditionalAuthorityResource extends Resource
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
            'object' => 'TraditionalAuthority',
            'traditionalAuthorityID' => $this->traditional_authority_id,
            'name' => $this->name,
            'district' => Districts::resource($this->district),
            'dateCreated' => $this->date_created
        ];
    }
}
