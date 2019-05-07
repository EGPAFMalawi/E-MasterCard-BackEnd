<?php

namespace App\Modules\Core\EncounterTypes\Clients\API\Controllers;

use App\Http\Controllers\Controller;

use App\Modules\Core\EncounterTypes\Clients\API\Resources\EncounterTypeResource;
use App\Modules\Core\EncounterTypes\Data\Models\EncounterType;
use App\Modules\Core\EncounterTypes\Processing\Actions\GetAllEncounterTypesAction;
use Illuminate\Support\Facades\App;

class EncounterTypeAPIController extends  Controller
{
    public function getAll()
    {
        return EncounterTypeResource::collection(App::make(GetAllEncounterTypesAction::class)->run());
    }

    public function get(EncounterType $encounterType)
    {
        return new EncounterTypeResource($encounterType);
    }
}
