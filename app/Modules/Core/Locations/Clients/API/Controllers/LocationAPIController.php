<?php

namespace App\Modules\Core\Locations\Clients\API\Controllers;

use App\Http\Controllers\Controller;

use App\Modules\Core\Locations\Clients\API\Resources\LocationResource;
use App\Modules\Core\Locations\Data\Models\Location;
use App\Modules\Core\Locations\Processing\Actions\GetAllLocationsAction;
use Illuminate\Support\Facades\App;

class LocationAPIController extends  Controller
{
    public function getAll()
    {
        return LocationResource::collection(App::make(GetAllLocationsAction::class)->run());
    }

    public function get(Location $location)
    {
        return new LocationResource($location);
    }
}
