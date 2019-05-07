<?php

namespace App\Modules\Core\PatientCards\Processing\Actions;

use App\Modules\Core\PatientCards\Data\Repositories\PatientCardRepository;
use Illuminate\Support\Facades\App;


class GetAllPatientCardsAction
{
    public function run()
    {
        return App::make(PatientCardRepository::class)->getAll();
    }
}
