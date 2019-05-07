<?php

namespace App\Modules\Core\Villages\Clients\API\Controllers;

use App\Http\Controllers\Controller;

use App\Modules\Core\Villages\Clients\API\Resources\VillageResource;
use App\Modules\Core\Villages\Data\Models\Village;
use App\Modules\Core\Villages\Processing\Actions\GetAllVillagesAction;
use Illuminate\Support\Facades\App;

class VillageAPIController extends  Controller
{
    public function getAll()
    {
        return VillageResource::collection(App::make(GetAllVillagesAction::class)->run());
    }

    public function get(Village $village)
    {
        return new VillageResource($village);
    }
}
