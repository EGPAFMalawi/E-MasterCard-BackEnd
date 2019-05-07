<?php

namespace App\Modules\Core\PersonNames\Clients\API\Resources;

use Illuminate\Http\Resources\Json\Resource;

class PersonNameResource extends Resource
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
            'object' => 'PersonName',
            'personNameID' => $this->person_name_id,
            'prefix' => $this->prefix,
            'given' => $this->given_name,
            'middle' => $this->middle_name,
            'family' => $this->family
        ];
    }
}
