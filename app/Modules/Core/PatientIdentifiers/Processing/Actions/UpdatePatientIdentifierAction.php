<?php

namespace App\Modules\Core\PatientIdentifiers\Processing\Actions;

use App\Modules\Core\PatientIdentifiers\Data\Models\PatientIdentifier;
use App\Modules\Core\PatientIdentifiers\Data\Repositories\PatientIdentifierRepository;
use Illuminate\Support\Facades\App;


class UpdatePatientIdentifierAction
{
    public function run($data, PatientIdentifier $patientIdentifier)
    {
        $patientIdentifier = App::make(PatientIdentifierRepository::class)->update($data, $patientIdentifier);

        return $patientIdentifier;
    }
}
