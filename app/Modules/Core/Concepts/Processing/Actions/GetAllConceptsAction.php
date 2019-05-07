<?php

namespace App\Modules\Core\Concepts\Processing\Actions;

use App\Modules\Core\Concepts\Data\Repositories\ConceptRepository;
use Illuminate\Support\Facades\App;


class GetAllConceptsAction
{
    public function run()
    {
        return App::make(ConceptRepository::class)->getAll();
    }
}
