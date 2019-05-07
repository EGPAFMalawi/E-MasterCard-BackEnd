<?php

namespace App\Modules\Core\Observations\Data\Repositories;

use App\Modules\Core\Concepts\Data\Models\Concept;
use App\Modules\Core\Encounters\Data\Models\Encounter;
use App\Modules\Core\Observations\Data\Models\Observation;
use App\Modules\Core\Persons\Data\Models\Person;
use Carbon\Carbon;

class ObservationRepository {
    
    public function get($id)
    {
        return Observation::find($id);
    }

    public function whereIn($field, $values)
    {
        return Observation::whereIn($field, $values)->get();
    }

    public function create($data, Concept $concept, Encounter $encounter, Person $person)
    {
        $observation = new Observation;
        $observation->obs_datetime = Carbon::now();

        $observation->person()->associate($person);
        $observation->encounter()->associate($encounter);
        $observation->concept()->associate($concept);

        $observation = $this->fillValue($observation, $concept->datatype, $data['value']);
        $observation->save();

        return $observation;
    }

    public function update($data, Observation $observation, Concept $concept)
    {
        $observation = $this->fillValue($observation, $concept->datatype, $data['value']);
        $observation->save();

        return $observation;
    }

    public function fillValue($observation, $conceptDatatype, $value)
    {
        if ($conceptDatatype->hl7_abbreviation == 'NM')
            $observation->value_numeric = $value;
        elseif($conceptDatatype->hl7_abbreviation == 'DT')
            $observation->value_datetime = Carbon::parse($value)->toDateTimeString();
        elseif($conceptDatatype->hl7_abbreviation == 'ZZ')
            $observation->value_text = $value;
        else
            $observation->value_text = $value;

        return $observation;
    }
}