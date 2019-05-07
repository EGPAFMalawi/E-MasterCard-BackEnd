<?php

namespace App\Modules\Core\ConceptNames\Data\Repositories;

use App\Modules\Core\ConceptNames\Data\Models\ConceptName;

class ConceptNameRepository {

    public function getAll()
    {
        return ConceptName::all();
    }

    public function get($id)
    {
        return ConceptName::find($id);
    }

    public function getBy($field, $value)
    {
        return ConceptName::where($field, $value)->first();
    }
}