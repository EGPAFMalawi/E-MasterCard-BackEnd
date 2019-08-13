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

    public function create(Patient $patient, EncounterType $encounterType, $encounterDatetime, Person $person)
    {
        $encounter = new Encounter;
        $encounter->encounter_datetime = $encounterDatetime;

        $encounter->patient()->associate($patient);
        $encounter->type()->associate($encounterType);
        $encounter->provider()->associate($person);

        $encounter->save();

        return $encounter;
    }

    public function update($data, Encounter $encounter, $encounterDatetime)
    {
        $encounter->encounter_datetime = $encounterDatetime;
        $encounter->update($data);

        return $encounter;
    }
}