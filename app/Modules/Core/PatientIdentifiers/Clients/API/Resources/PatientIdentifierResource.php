<?php

namespace App\Modules\Core\PatientIdentifiers\Clients\API\Resources;

use App\Modules\Core\PatientIdentifierTypes\PatientIdentifierTypes;
use Illuminate\Http\Resources\Json\Resource;

class PatientIdentifierResource extends Resource
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
            'object' => 'PatientIdentifierResource',
            'patientIdentifierID' => $this->patient_identifier_id,
            'identifier' => $this->identifier,
            'patientID' => $this->patient->patient_id,
            'patientIdentifierType' => PatientIdentifierTypes::resource($this->identifierType),
            'dateCreated' => $this->date_created,
        ];
    }
}
