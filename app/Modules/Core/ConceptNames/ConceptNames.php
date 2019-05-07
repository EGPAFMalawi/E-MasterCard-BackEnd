<?php

namespace App\Modules\Core\ConceptNames;

use App\Modules\Core\ConceptNames\Clients\API\Resources\ConceptNameResource;
use App\Modules\Core\ConceptNames\Data\Models\ConceptName;
use App\Modules\Core\ConceptNames\Data\Repositories\ConceptNameRepository;
use Illuminate\Support\Facades\App;

class ConceptNames{

    public static function repository()
    {
        return App::make(ConceptNameRepository::class);
    }

    public static function resource(ConceptName $conceptName)
    {
        return new ConceptNameResource($conceptName);
    }

    public static function resourceCollection($conceptNames)
    {
        return ConceptNameResource::collection($conceptNames);
    }

}