<?php

namespace App\Modules\Core\PatientCards\Clients\API\Resources;

use App\Modules\Core\MasterCards\MasterCards;
use App\Modules\Core\Patients\Patients;
use Illuminate\Http\Resources\Json\Resource;

class PatientCardResource extends Resource
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
            'object' => 'PatientCard',
            'patientCardID' => $this->patient_card_id,
            'patient' => Patients::resource($this->patient),
            'masterCard' => MasterCards::resource($this->masterCard),
            'dateCreated' => (string)$this->date_created,
            'uuid' => $this->uuid
        ];
    }
}
