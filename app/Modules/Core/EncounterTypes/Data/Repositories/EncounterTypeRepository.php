<?php

namespace App\Modules\Core\EncounterTypes\Data\Repositories;

use App\Modules\Core\EncounterTypes\Data\Models\EncounterType;

class EncounterTypeRepository {

    public function getAll()
    {
        return EncounterType::all();
    }

    public function get($id)
    {
        return EncounterType::find($id);
    }

    public function getBy($field, $value)
    {
        return EncounterType::where($field, $value)->first();
    }
}