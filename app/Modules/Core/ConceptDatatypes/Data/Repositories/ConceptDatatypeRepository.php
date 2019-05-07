<?php

namespace App\Modules\Core\ConceptDatatypes\Data\Repositories;

use App\Modules\Core\ConceptDatatypes\Data\Models\ConceptDatatype;

class ConceptDatatypeRepository {

    public function getAll()
    {
        return ConceptDatatype::all();
    }

    public function get($id)
    {
        return ConceptDatatype::find($id);
    }

    public function getBy($field, $value)
    {
        return ConceptDatatype::where($field, $value)->first();
    }
}