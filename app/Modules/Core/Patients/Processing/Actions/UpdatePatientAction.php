<?php

namespace App\Modules\Core\Patients\Processing\Actions;

class UpdatePatientAction
{
    public function run($data, $patient)
    {
        $patient->update($data);

        return $patient;
    }
}
