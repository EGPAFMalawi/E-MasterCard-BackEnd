<?php

namespace App\Modules\Core\ConceptDatatypes\Processing\Actions;

use App\Modules\Core\ConceptDatatypes\Data\Repositories\ConceptDatatypeRepository;
use Illuminate\Support\Facades\App;


class GetAllConceptDatatypesAction
{
    public function run()
    {
        return App::make(ConceptDatatypeRepository::class)->getAll();
    }
}
