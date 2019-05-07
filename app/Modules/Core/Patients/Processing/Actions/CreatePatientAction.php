<?php

namespace App\Modules\Core\Patients\Processing\Actions;

use App\Modules\Core\Patients\Data\Repositories\PatientRepository;
use App\Modules\Core\Persons\Persons;
use Illuminate\Support\Facades\App;


class CreatePatientAction
{
    public function run($data)
    {
        $person = Persons::create($data);

        $patient = App::make(PatientRepository::class)->create($data, $person);

        return $patient;
    }
}
