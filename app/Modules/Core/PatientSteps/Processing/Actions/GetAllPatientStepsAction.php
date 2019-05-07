<?php

namespace App\Modules\Core\PatientSteps\Processing\Actions;

use App\Modules\Core\PatientSteps\Data\Repositories\PatientStepRepository;
use Illuminate\Support\Facades\App;


class GetAllPatientStepsAction
{
    public function run()
    {
        return App::make(PatientStepRepository::class)->getAll();
    }
}
