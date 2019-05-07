<?php

namespace App\Modules\Core\Locations;

use App\Modules\Core\Locations\Clients\API\Resources\LocationResource;
use App\Modules\Core\Locations\Data\Models\Location;
use App\Modules\Core\Locations\Data\Repositories\LocationRepository;
use Illuminate\Support\Facades\App;

class Locations{

    public static function repository()
    {
        return App::make(LocationRepository::class);
    }

    public static function resource(Location $location)
    {
        return new LocationResource($location);
    }

    public static function resourceCollection($locations)
    {
        return LocationResource::collection($locations);
    }

}