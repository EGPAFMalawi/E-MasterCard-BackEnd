<?php

namespace App\Modules\Core\EncounterTypes;

use App\Modules\Core\EncounterTypes\Clients\API\Resources\EncounterTypeResource;
use App\Modules\Core\EncounterTypes\Data\Models\EncounterType;
use App\Modules\Core\EncounterTypes\Data\Repositories\EncounterTypeRepository;
use Illuminate\Support\Facades\App;

class EncounterTypes{

    public static function repository()
    {
        return App::make(EncounterTypeRepository::class);
    }

    public static function resource(EncounterType $encounterType)
    {
        return new EncounterTypeResource($encounterType);
    }

    public static function resourceCollection($encounterTypes)
    {
        return EncounterTypeResource::collection($encounterTypes);
    }

}