<?php

namespace App\Modules\Core\ConceptNames\Processing\Actions;

use App\Modules\Core\ConceptNames\Data\Repositories\ConceptNameRepository;
use Illuminate\Support\Facades\App;


class GetAllConceptNamesAction
{
    public function run()
    {
        return App::make(ConceptNameRepository::class)->getAll();
    }
}
