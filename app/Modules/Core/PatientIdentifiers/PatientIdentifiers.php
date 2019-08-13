<?php

namespace App\Modules\Core\PatientIdentifiers;

use App\Modules\Core\PatientIdentifiers\Clients\API\Resources\PatientIdentifierResource;
use App\Modules\Core\PatientIdentifiers\Data\Models\PatientIdentifier;
use App\Modules\Core\PatientIdentifiers\Data\Repositories\PatientIdentifierRepository;
use App\Modules\Core\PatientIdentifiers\Processing\Actions\CreatePatientIdentifierAction;
use App\Modules\Core\PatientIdentifierTypes\Data\Models\PatientIdentifierType;
use App\Modules\Core\Patients\Data\Models\Patient;
use Illuminate\Support\Facades\App;

class PatientIdentifiers{

    public static function repository()
    {
        return App::make(PatientIdentifierRepository::class);
    }

    public static function resource(PatientIdentifier $patientIdentifier)
    {
        return new PatientIdentifierResource($patientIdentifier);
    }

    public static function resourceCollection($patientIdentifiers)
    {
        return PatientIdentifierResource::collection($patientIdentifiers);
    }
}