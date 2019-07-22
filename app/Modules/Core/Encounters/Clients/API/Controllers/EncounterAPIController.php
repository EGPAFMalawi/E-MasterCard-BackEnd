<?php

namespace App\Modules\Core\Encounters\Clients\API\Controllers;

use App\Http\Controllers\Controller;

use App\Modules\Core\Encounters\Clients\API\Resources\EncounterResource;
use App\Modules\Core\Encounters\Data\Models\Encounter;
use App\Modules\Core\Encounters\Processing\Actions\GetAllEncountersAction;
use App\Modules\Core\Encounters\Processing\Actions\ToggleVoidEncounterAction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class EncounterAPIController extends  Controller
{
    public function getAll()
    {
        return EncounterResource::collection(App::make(GetAllEncountersAction::class)->run());
    }

    public function get(Encounter $encounter)
    {
        return new EncounterResource($encounter);
    }

    public function toggleVoid(Request $request, Encounter $encounter)
    {
        return new EncounterResource(App::make(ToggleVoidEncounterAction::class)->run($request->all(), $encounter));
    }
}
