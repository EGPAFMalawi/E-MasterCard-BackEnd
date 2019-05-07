<?php

namespace App\Modules\Core\Concepts\Clients\API\Controllers;

use App\Http\Controllers\Controller;

use App\Modules\Core\Concepts\Clients\API\Resources\ConceptResource;
use App\Modules\Core\Concepts\Data\Models\Concept;
use App\Modules\Core\Concepts\Processing\Actions\GetAllConceptsAction;
use Illuminate\Support\Facades\App;

class ConceptAPIController extends  Controller
{
    public function getAll()
    {
        return ConceptResource::collection(App::make(GetAllConceptsAction::class)->run());
    }

    public function get(Concept $concept)
    {
        return new ConceptResource($concept);
    }
}
