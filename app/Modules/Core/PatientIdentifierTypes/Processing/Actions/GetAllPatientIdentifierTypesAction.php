<?php

namespace App\Modules\Core\PatientIdentifierTypes\Processing\Actions;

use App\Modules\Core\PatientIdentifierTypes\Data\Repositories\PatientIdentifierTypeRepository;
use Illuminate\Support\Facades\App;


class GetAllPatientIdentifierTypesAction
{
    public function run()
    {
        return App::make(PatientIdentifierTypeRepository::class)->getAll();
    }
}
