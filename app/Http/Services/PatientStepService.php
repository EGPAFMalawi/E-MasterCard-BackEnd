<?php

namespace App\Http\Services;

use App\Patient;
use App\PatientStep;
use App\Person;
use Carbon\Carbon;

class PatientStepService
{

    public function create(Patient $patient, $data)
    {
        $patientStep = new PatientStep;
        $patientStep->fill($data);

        if (isset($data['date']))
            $patientStep->date = Carbon::parse($data['date'])->toDateString();

        $patientStep->patient()->associate($patient);

        $patientStep->save();

        return $patientStep;
    }

    public function update(Patient $patient, $data)
    {
        $patient->update($data);

        return $patient;
    }
}
