<?php

namespace App\Modules\Core\Regions\Clients\API\Controllers;

use App\Http\Controllers\Controller;

use App\Modules\Core\Regions\Clients\API\Resources\RegionResource;
use App\Modules\Core\Regions\Data\Models\Region;
use App\Modules\Core\Regions\Processing\Actions\GetAllRegionsAction;
use Illuminate\Support\Facades\App;

class RegionAPIController extends  Controller
{
    public function getAll()
    {
        return RegionResource::collection(App::make(GetAllRegionsAction::class)->run());
    }

    public function get(Region $region)
    {
        return new RegionResource($region);
    }
}
