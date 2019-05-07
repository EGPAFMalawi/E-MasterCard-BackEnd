<?php

namespace App\Modules\Core\PatientSteps\Clients\API\Resources;

use Illuminate\Http\Resources\Json\Resource;

class PatientStepResource extends Resource
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
            'object' => 'PatientStep',
            'patientStepID' => $this->patient_step_id,
            'artNumber' => $this->art_number,
            'date' => $this->date,
            'site' => $this->site,
            'step' => $this->step,
            'originDestination' => $this->origin_destination
        ];
    }
}
