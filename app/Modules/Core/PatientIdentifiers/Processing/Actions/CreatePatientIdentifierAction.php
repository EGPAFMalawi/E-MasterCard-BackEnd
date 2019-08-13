<?php

namespace App\Modules\Core\PatientIdentifiers\Processing\Actions;

use App\Modules\Core\PatientIdentifiers\Data\Repositories\PatientIdentifierRepository;
use App\Modules\Core\PatientIdentifierTypes\PatientIdentifierTypes;
use App\Modules\Core\Patients\Patients;
use Illuminate\Support\Facades\App;


class CreatePatientIdentifierAction
{
    public function run($data)
    {
        $patient = Patients::repository()->get($data['patient']);
        $patientIdentifierType = PatientIdentifierTypes::repository()->get(4);

        $patientIdentifier = App::make(PatientIdentifierRepository::class)->create($data, $patient, $patientIdentifierType);

        return $patientIdentifier;
    }
}
