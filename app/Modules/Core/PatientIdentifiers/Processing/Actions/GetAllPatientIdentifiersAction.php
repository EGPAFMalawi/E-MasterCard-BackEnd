<?php

namespace App\Modules\Core\PatientIdentifiers\Processing\Actions;

use App\Modules\Core\PatientIdentifiers\Data\Repositories\PatientIdentifierRepository;
use Illuminate\Support\Facades\App;


class GetAllPatientIdentifiersAction
{
    public function run()
    {
        return App::make(PatientIdentifierRepository::class)->getAll();
    }
}
