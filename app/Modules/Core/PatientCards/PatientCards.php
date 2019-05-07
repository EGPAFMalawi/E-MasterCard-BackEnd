<?php

namespace App\Modules\Core\PatientCards;

use App\Modules\Core\PatientCards\Clients\API\Resources\PatientCardResource;
use App\Modules\Core\PatientCards\Data\Models\PatientCard;
use App\Modules\Core\PatientCards\Data\Repositories\PatientCardRepository;
use Illuminate\Support\Facades\App;

class PatientCards{

    public static function repository()
    {
        return App::make(PatientCardRepository::class);
    }

    public static function resource(PatientCard $patientCard)
    {
        return new PatientCardResource($patientCard);
    }

    public static function resourceCollection($patientCards)
    {
        return PatientCardResource::collection($patientCards);
    }

}