<?php

namespace App\Modules\Core\Observations;

use App\Modules\Core\Observations\Clients\API\Resources\ObservationResource;
use App\Modules\Core\Observations\Data\Models\Observation;
use App\Modules\Core\Observations\Data\Repositories\ObservationRepository;
use Illuminate\Support\Facades\App;

class Observations{

    public static function repository()
    {
        return App::make(ObservationRepository::class);
    }

    public static function resource(Observation $observation)
    {
        return new ObservationResource($observation);
    }

    public static function resourceCollection($observations)
    {
        return ObservationResource::collection($observations);
    }

}