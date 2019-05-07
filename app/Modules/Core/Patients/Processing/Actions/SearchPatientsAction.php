<?php

namespace App\Modules\Core\Patients\Processing\Actions;

use App\Modules\Core\Patients\Data\Repositories\PatientRepository;
use Illuminate\Support\Facades\App;


class SearchPatientsAction
{
    public function run($data)
    {
        $patients = App::make(PatientRepository::class)->search($data['search']);

        return $patients;
    }
}
