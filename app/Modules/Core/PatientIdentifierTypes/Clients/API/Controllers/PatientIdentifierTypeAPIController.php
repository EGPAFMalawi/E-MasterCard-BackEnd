<?php

namespace App\Modules\Core\PatientIdentifierTypes\Clients\API\Controllers;

use App\Http\Controllers\Controller;

use App\Modules\Core\PatientIdentifierTypes\Clients\API\Resources\PatientIdentifierTypeResource;
use App\Modules\Core\PatientIdentifierTypes\Data\Models\PatientIdentifierType;
use App\Modules\Core\PatientIdentifierTypes\Processing\Actions\GetAllPatientIdentifierTypesAction;
use Illuminate\Support\Facades\App;

class PatientIdentifierTypeAPIController extends  Controller
{
    public function getAll()
    {
        return PatientIdentifierTypeResource::collection(App::make(GetAllPatientIdentifierTypesAction::class)->run());
    }

    public function get(PatientIdentifierType $patientIdentifierType)
    {
        return new PatientIdentifierTypeResource($patientIdentifierType);
    }
}
