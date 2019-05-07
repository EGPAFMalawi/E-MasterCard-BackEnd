<?php

namespace App\Modules\Core\ConceptNames\Clients\API\Controllers;

use App\Http\Controllers\Controller;

use App\Modules\Core\ConceptNames\Clients\API\Resources\ConceptNameResource;
use App\Modules\Core\ConceptNames\Data\Models\ConceptName;
use App\Modules\Core\ConceptNames\Processing\Actions\GetAllConceptNamesAction;
use Illuminate\Support\Facades\App;

class ConceptNameAPIController extends  Controller
{
    public function getAll()
    {
        return ConceptNameResource::collection(App::make(GetAllConceptNamesAction::class)->run());
    }

    public function get(ConceptName $conceptName)
    {
        return new ConceptNameResource($conceptName);
    }
}
