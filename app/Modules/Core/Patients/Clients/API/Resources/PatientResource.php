<?php

namespace App\Modules\Core\Patients\Clients\API\Resources;

use App\Modules\Core\Persons\Persons;
use Illuminate\Http\Resources\Json\Resource;

class PatientResource extends Resource
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
            'object' => 'PatientResource',
            'patientID' => $this->patient_id,
            'artNumber' => $this->art_number,
            'lastVisitDate' => $this->last_visit_date,
            'guardianName' => $this->guardian_name,
            'patientPhone' => $this->patient_phone,
            'guardianPhone' => $this->guardian_phone,
            'followUp' => $this->follow_up,
            'soldier' => (int)$this->is_soldier,
            'guardianRelation' => $this->guardian_relation,
            'person' => Persons::resource($this->person),
            'dateCreated' => (string)$this->date_created,
        ];
    }
}
