<?php

namespace App\Modules\Core\PatientCards\Data\Repositories;

use App\Modules\Core\MasterCards\Data\Models\MasterCard;
use App\Modules\Core\PatientCards\Data\Models\PatientCard;
use App\Modules\Core\Patients\Data\Models\Patient;

class PatientCardRepository {

    public function getAll()
    {
        return PatientCard::all();
    }

    public function get($id)
    {
        return PatientCard::find($id);
    }

    public function create(Patient $patient, MasterCard $masterCard)
    {
        $patientCard = new PatientCard;
        $patientCard->patient()->associate($patient);
        $patientCard->masterCard()->associate($masterCard);

        $patientCard->save();

        return $patientCard;
    }
}