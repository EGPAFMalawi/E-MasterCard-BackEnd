<?php

namespace App\Modules\Core\PatientSteps\Data\Repositories;

use App\Modules\Core\Patients\Data\Models\Patient;
use App\Modules\Core\PatientSteps\Data\Models\PatientStep;
use App\Modules\Core\PatientSteps\Data\Models\Person;
use Carbon\Carbon;

class PatientStepRepository {

    public function getAll()
    {
        return PatientStep::all();
    }

    public function get($id)
    {
        return PatientStep::find($id);
    }

    public function getBy($field, $value)
    {
        return PatientStep::where($field, $value)->first();
    }

    public function create($data, Patient $patient)
    {
        $patientStep = new PatientStep;
        $patientStep->fill($data);

        if (isset($data['date']))
            $patientStep->date = Carbon::parse($data['date'])->toDateString();

        $patientStep->patient()->associate($patient);

        $patientStep->save();

        return $patientStep;
    }

    public function update($data, PatientStep $patientStep)
    {
        $patientStep->update($data);

        return $patientStep;
    }
}