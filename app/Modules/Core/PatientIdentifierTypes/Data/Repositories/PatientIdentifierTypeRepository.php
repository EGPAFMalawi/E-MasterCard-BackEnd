<?php

namespace App\Modules\Core\PatientIdentifierTypes\Data\Repositories;

use App\Modules\Core\PatientIdentifierTypes\Data\Models\PatientIdentifierType;

class PatientIdentifierTypeRepository {

    public function getAll()
    {
        return PatientIdentifierType::all();
    }

    public function get($id)
    {
        return PatientIdentifierType::find($id);
    }

    public function getBy($field, $value)
    {
        return PatientIdentifierType::where($field, $value)->first();
    }
}