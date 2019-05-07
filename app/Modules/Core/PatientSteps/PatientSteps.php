<?php

namespace App\Modules\Core\PatientSteps;

use App\Modules\Core\PatientSteps\Clients\API\Resources\PatientStepResource;
use App\Modules\Core\PatientSteps\Data\Models\PatientStep;
use App\Modules\Core\PatientSteps\Data\Repositories\PatientStepRepository;
use Illuminate\Support\Facades\App;

class PatientSteps{

    public static function repository()
    {
        return App::make(PatientStepRepository::class);
    }

    public static function resource(PatientStep $patientStep)
    {
        return new PatientStepResource($patientStep);
    }

    public static function resourceCollection($patientSteps)
    {
        return PatientStepResource::collection($patientSteps);
    }

}