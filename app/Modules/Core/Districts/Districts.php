<?php

namespace App\Modules\Core\Districts;

use App\Modules\Core\Districts\Clients\API\Resources\DistrictResource;
use App\Modules\Core\Districts\Data\Models\District;
use App\Modules\Core\Districts\Data\Repositories\DistrictRepository;
use Illuminate\Support\Facades\App;

class Districts{

    public static function repository()
    {
        return App::make(DistrictRepository::class);
    }

    public static function resource(District $district)
    {
        return new DistrictResource($district);
    }

    public static function resourceCollection($districts)
    {
        return DistrictResource::collection($districts);
    }

}