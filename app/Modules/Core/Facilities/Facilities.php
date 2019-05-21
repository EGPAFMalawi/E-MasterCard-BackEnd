<?php

namespace App\Modules\Core\Facilities;

use App\Modules\Core\Facilities\Clients\API\Resources\FacilityResource;
use App\Modules\Core\Facilities\Data\Models\Facility;
use App\Modules\Core\Facilities\Data\Repositories\FacilityRepository;
use Illuminate\Support\Facades\App;

class Facilities{

    public static function repository()
    {
        return App::make(FacilityRepository::class);
    }

    public static function resource(Facility $facility)
    {
        return new FacilityResource($facility);
    }

    public static function resourceCollection($facilities)
    {
        return FacilityResource::collection($facilities);
    }

}