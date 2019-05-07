<?php

namespace App\Modules\Core\Regions;

use App\Modules\Core\Regions\Clients\API\Resources\RegionResource;
use App\Modules\Core\Regions\Data\Models\Region;
use App\Modules\Core\Regions\Data\Repositories\RegionRepository;
use Illuminate\Support\Facades\App;

class Regions{

    public static function repository()
    {
        return App::make(RegionRepository::class);
    }

    public static function resource(Region $region)
    {
        return new RegionResource($region);
    }

    public static function resourceCollection($regions)
    {
        return RegionResource::collection($regions);
    }

}