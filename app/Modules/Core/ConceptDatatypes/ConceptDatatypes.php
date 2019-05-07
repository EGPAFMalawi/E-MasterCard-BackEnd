<?php

namespace App\Modules\Core\ConceptDatatypes;

use App\Modules\Core\ConceptDatatypes\Clients\API\Resources\ConceptDatatypeResource;
use App\Modules\Core\ConceptDatatypes\Data\Models\ConceptDatatype;
use App\Modules\Core\ConceptDatatypes\Data\Repositories\ConceptDatatypeRepository;
use Illuminate\Support\Facades\App;

class ConceptDatatypes{

    public static function repository()
    {
        return App::make(ConceptDatatypeRepository::class);
    }

    public static function resource(ConceptDatatype $conceptDatatype)
    {
        return new ConceptDatatypeResource($conceptDatatype);
    }

    public static function resourceCollection($conceptDatatypes)
    {
        return ConceptDatatypeResource::collection($conceptDatatypes);
    }

}