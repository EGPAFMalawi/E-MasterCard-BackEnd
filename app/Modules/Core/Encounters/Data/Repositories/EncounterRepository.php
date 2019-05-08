<?php

namespace App\Modules\Core\Encounters\Data\Repositories;

use App\Modules\Core\Encounters\Data\Models\Encounter;
use App\Modules\Core\EncounterTypes\Data\Models\EncounterType;
use App\Modules\Core\Patients\Data\Models\Patient;
use App\Modules\Core\Persons\Data\Models\Person;
use Carbon\Carbon;

class EncounterRepository {

    public function getAll()
    {
        return Encounter::all();
    }

    public function get($id)
    {
        return Encounter::find($id);
    }

    public function getBy($field, $value)
    {
        return Encounter::where($field, $value)->first();
    }

    public function create(Patient $patient, EncounterType $encounterType, Person $person)
    {
        $encounter = new Encounter;
        $encounter->encounter_datetime = Carbon::now();

        $encounter->patient()->associate($patient);
        $encounter->type()->associate($encounterType);
        $encounter->provider()->associate($person);

        $encounter->save();

        return $encounter;
    }
}