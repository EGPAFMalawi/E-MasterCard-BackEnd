<?php

namespace App\Modules\Core\Encounters\Processing\Actions;

use App\Modules\Core\Encounters\Data\Repositories\EncounterRepository;
use App\Modules\Core\EncounterTypes\Data\Models\EncounterType;
use App\Modules\Core\EncounterTypes\EncounterTypes;
use App\Modules\Core\Patients\Data\Models\Patient;
use App\Modules\Core\Patients\Patients;
use App\Modules\Core\Persons\Data\Models\Person;
use App\Modules\Core\Persons\Persons;
use Illuminate\Support\Facades\App;


class CreateEncounterAction
{
    public function run(Patient $patient, EncounterType $encounterType)
    {
        $person = Persons::repository()->get($patient->person);

        $encounter = App::make(EncounterRepository::class)->create($patient, $encounterType, $person);

        return $encounter;
    }
}
