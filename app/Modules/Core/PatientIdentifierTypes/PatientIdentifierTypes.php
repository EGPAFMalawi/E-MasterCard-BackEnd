<?php

namespace App\Modules\Core\PatientIdentifierTypes;

use App\Modules\Core\PatientIdentifierTypes\Clients\API\Resources\PatientIdentifierTypeResource;
use App\Modules\Core\PatientIdentifierTypes\Data\Models\PatientIdentifierType;
use App\Modules\Core\PatientIdentifierTypes\Data\Repositories\PatientIdentifierTypeRepository;
use Illuminate\Support\Facades\App;

class PatientIdentifierTypes{

    public static function repository()
    {
        return App::make(PatientIdentifierTypeRepository::class);
    }

    public static function resource(PatientIdentifierType $patientIdentifierType)
    {
        return new PatientIdentifierTypeResource($patientIdentifierType);
    }

    public static function resourceCollection($patientIdentifierTypes)
    {
        return PatientIdentifierTypeResource::collection($patientIdentifierTypes);
    }

}