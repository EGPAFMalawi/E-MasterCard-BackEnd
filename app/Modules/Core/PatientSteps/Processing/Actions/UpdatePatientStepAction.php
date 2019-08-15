<?php

namespace App\Modules\Core\PatientSteps\Processing\Actions;

class UpdatePatientStepAction
{
    public function run($data, $patientStep)
    {
        $patientStep->update($data);

        return $patientStep;
    }
}
