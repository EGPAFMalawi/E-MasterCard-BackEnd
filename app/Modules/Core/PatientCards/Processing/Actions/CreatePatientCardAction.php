<?php

namespace App\Modules\Core\PatientCards\Processing\Actions;

use App\Modules\Core\MasterCards\MasterCards;
use App\Modules\Core\Patients\Patients;
use App\Modules\Core\PatientCards\Data\Repositories\PatientCardRepository;
use Illuminate\Support\Facades\App;


class CreatePatientCardAction
{
    public function run($data)
    {
        $patient = Patients::repository()->get($data['patient']);
        $masterCard = MasterCards::repository()->get($data['master-card']);

        $patientCard = App::make(PatientCardRepository::class)->create($patient, $masterCard);

        return $patientCard;
    }
}
