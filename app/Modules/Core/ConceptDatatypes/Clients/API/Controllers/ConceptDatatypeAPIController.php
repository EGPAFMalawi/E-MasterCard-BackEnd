<?php

namespace App\Modules\Core\ConceptDatatypes\Clients\API\Controllers;

use App\Http\Controllers\Controller;

use App\Modules\Core\ConceptDatatypes\Clients\API\Resources\ConceptDatatypeResource;
use App\Modules\Core\ConceptDatatypes\Data\Models\ConceptDatatype;
use App\Modules\Core\ConceptDatatypes\Processing\Actions\GetAllConceptDatatypesAction;
use Illuminate\Support\Facades\App;

class ConceptDatatypeAPIController extends  Controller
{
    public function getAll()
    {
        return ConceptDatatypeResource::collection(App::make(GetAllConceptDatatypesAction::class)->run());
    }

    public function get(ConceptDatatype $conceptDatatype)
    {
        return new ConceptDatatypeResource($conceptDatatype);
    }
}
