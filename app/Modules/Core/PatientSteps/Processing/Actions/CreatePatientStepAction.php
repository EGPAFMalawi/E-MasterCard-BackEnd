<?php

namespace App\Modules\Core\PatientSteps\Processing\Actions;

use App\Modules\Core\Patients\Patients;
use App\Modules\Core\PatientSteps\Data\Repositories\PatientStepRepository;
use Illuminate\Support\Facades\App;


class CreatePatientStepAction
{
    public function run($data)
    {
        $patient = Patients::repository()->get($data['patient']);

        $patientStep = App::make(PatientStepRepository::class)->create($data, $patient);

        return $patientStep;
    }
}
