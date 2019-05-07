<?php

namespace App\Modules\Core\Encounters;

use App\Modules\Core\Encounters\Clients\API\Resources\EncounterResource;
use App\Modules\Core\Encounters\Data\Models\Encounter;
use App\Modules\Core\Encounters\Data\Repositories\EncounterRepository;
use App\Modules\Core\Encounters\Processing\Actions\CreateEncounterAction;
use App\Modules\Core\EncounterTypes\Data\Models\EncounterType;
use App\Modules\Core\Patients\Data\Models\Patient;
use Illuminate\Support\Facades\App;

class Encounters{

    public static function repository()
    {
        return App::make(EncounterRepository::class);
    }

    public static function resource(Encounter $encounter)
    {
        return new EncounterResource($encounter);
    }

    public static function resourceCollection($encounters)
    {
        return EncounterResource::collection($encounters);
    }

    public static function create(Patient $patient, EncounterType $encounterType)
    {
        return App::make(CreateEncounterAction::class)->run($patient, $encounterType);
    }

}