<?php

namespace App\Modules\Core\Villages;

use App\Modules\Core\Villages\Clients\API\Resources\VillageResource;
use App\Modules\Core\Villages\Data\Models\Village;
use App\Modules\Core\Villages\Data\Repositories\VillageRepository;
use Illuminate\Support\Facades\App;

class Villages{

    public static function repository()
    {
        return App::make(VillageRepository::class);
    }

    public static function resource(Village $village)
    {
        return new VillageResource($village);
    }

    public static function resourceCollection($villages)
    {
        return VillageResource::collection($villages);
    }

}