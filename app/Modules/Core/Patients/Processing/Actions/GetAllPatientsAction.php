<?php

namespace App\Modules\Core\Patients\Processing\Actions;

use App\Modules\Core\Patients\Data\Repositories\PatientRepository;
use Illuminate\Support\Facades\App;


class GetAllPatientsAction
{
    public function run()
    {
        return App::make(PatientRepository::class)->getAll();
    }
}
