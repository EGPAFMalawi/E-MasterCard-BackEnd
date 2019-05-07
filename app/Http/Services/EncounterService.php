<?php

namespace App\Http\Services;

use App\Encounter;
use App\EncounterType;
use App\Patient;
use Carbon\Carbon;

class EncounterService
{

    public function findByID($id)
    {
        return Encounter::find($id);
    }

    public function create(Patient $patient, EncounterType $encounterType)
    {
        $encounter = new Encounter;
        $encounter->encounter_datetime = Carbon::now();

        $encounter->patient()->associate($patient);
        $encounter->type()->associate($encounterType);
        $encounter->provider()->associate($patient->person);

        $encounter->save();

        return $encounter;
    }

}
