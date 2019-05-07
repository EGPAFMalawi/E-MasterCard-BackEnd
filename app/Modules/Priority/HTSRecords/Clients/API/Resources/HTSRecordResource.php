<?php

namespace App\Modules\Priority\HTSRecords\Clients\API\Resources;

use Illuminate\Http\Resources\Json\Resource;

class HTSRecordResource extends Resource
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
            'object' => 'HTSRecord',
            'HTSRecordID' => $this->hts_record_id,
            'age' => $this->age,
            'sex' => $this->sex,
            'status' => $this->status,
            'modality' => $this->modality
        ];
    }
}
