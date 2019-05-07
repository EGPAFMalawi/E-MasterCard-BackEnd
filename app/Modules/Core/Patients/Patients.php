<?php

namespace App\Modules\Core\Patients;

use App\Modules\Core\Patients\Clients\API\Resources\PatientResource;
use App\Modules\Core\Patients\Data\Models\Patient;
use App\Modules\Core\Patients\Data\Repositories\PatientRepository;
use Illuminate\Support\Facades\App;

class Patients{

    public static function repository()
    {
        return App::make(PatientRepository::class);
    }

    public static function resource(Patient $patient)
    {
        return new PatientResource($patient);
    }

    public static function resourceCollection($patients)
    {
        return PatientResource::collection($patients);
    }

}