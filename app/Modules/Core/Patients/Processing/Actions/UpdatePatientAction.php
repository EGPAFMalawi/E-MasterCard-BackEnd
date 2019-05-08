<?php

namespace App\Modules\Core\Patients\Processing\Actions;

use App\Modules\Core\Patients\Data\Models\Patient;
use App\Modules\Core\Patients\Data\Repositories\PatientRepository;
use App\Modules\Core\Persons\Persons;
use Illuminate\Support\Facades\App;

class UpdatePatientAction
{
    public function run($data, Patient $patient)
    {
        Persons::update($data, $patient->person);

        $patient = App::make(PatientRepository::class)->update($data, $patient);

        return $patient;
    }
}
