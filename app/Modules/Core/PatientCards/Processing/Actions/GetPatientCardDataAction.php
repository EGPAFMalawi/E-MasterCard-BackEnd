<?php

namespace App\Modules\Core\PatientCards\Processing\Actions;

use App\Modules\Core\Observations\Observations;
use App\Modules\Core\PatientCards\Data\Models\PatientCard;
use Illuminate\Support\Facades\App;


class GetPatientCardDataAction
{
    public function run($data, PatientCard $patientCard)
    {

        if ($data['consider-version'])
            $encounters = $patientCard->encounters;
        else
            $encounters = $patientCard->patient->encounters;

        $encounters = $encounters->where('encounter_type', $data['encounter-type']);

        $observations = Observations::repository()->whereIn('encounter_id', $encounters->pluck('encounter_id'));

        return $observations;
    }
}
