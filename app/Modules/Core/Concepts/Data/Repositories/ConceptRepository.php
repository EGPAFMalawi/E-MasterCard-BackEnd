<?php

namespace App\Modules\Core\Concepts\Data\Repositories;

use App\Modules\Core\Concepts\Data\Models\Concept;

class ConceptRepository {

    public function getAll()
    {
        return Concept::all();
    }

    public function get($id)
    {
        return Concept::find($id);
    }
}