<?php

namespace App\Modules\Core\PatientIdentifiers\Data\Repositories;

use App\Modules\Core\PatientIdentifiers\Data\Models\PatientIdentifier;
use App\Modules\Core\PatientIdentifierTypes\Data\Models\PatientIdentifierType;
use App\Modules\Core\Patients\Data\Models\Patient;
use App\Modules\Core\Persons\Data\Models\Person;
use Carbon\Carbon;

class PatientIdentifierRepository {

    public function getAll()
    {
        return PatientIdentifier::all();
    }

    public function get($id)
    {
        return PatientIdentifier::find($id);
    }

    public function getBy($field, $value)
    {
        return PatientIdentifier::where($field, $value)->first();
    }

    public function create($data, Patient $patient, PatientIdentifierType $patientIdentifierType)
    {
        $patientIdentifier = new PatientIdentifier;
        $patientIdentifier->fill($data);
        $patientIdentifier->patient()->associate($patient);
        $patientIdentifier->identifierType()->associate($patientIdentifierType);
        $patientIdentifier->save();

        return $patientIdentifier;
    }

    public function update($data, PatientIdentifier $patientIdentifier)
    {
        $patientIdentifier->update($data);

        return $patientIdentifier;
    }
}