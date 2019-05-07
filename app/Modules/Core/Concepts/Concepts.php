<?php

namespace App\Modules\Core\Concepts;

use App\Modules\Core\Concepts\Clients\API\Resources\ConceptResource;
use App\Modules\Core\Concepts\Data\Models\Concept;
use App\Modules\Core\Concepts\Data\Repositories\ConceptRepository;
use Illuminate\Support\Facades\App;

class Concepts{

    public static function repository()
    {
        return App::make(ConceptRepository::class);
    }

    public static function resource(Concept $concept)
    {
        return new ConceptResource($concept);
    }

    public static function resourceCollection($concepts)
    {
        return ConceptResource::collection($concepts);
    }

}