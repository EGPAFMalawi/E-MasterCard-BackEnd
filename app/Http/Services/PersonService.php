<?php

namespace App\Http\Services;

use App\Person;
use App\PersonAddress;
use App\PersonName;

class PersonService
{

    public function findById($id)
    {
        return Person::find($id);
    }

    public function findByARTRegNum($patient)
    {
        //return Patient::where
    }

    public function create($data)
    {
        $person = new Person;
        $person->fill($data);
        $person->save();

        $personName = new PersonName;
        $personName->fill($data);
        $personName->person()->associate($person);
        $personName->save();

        $personAddress = new PersonAddress;
        $personAddress->fill($data);
        $personAddress->person()->associate($person);
        $personAddress->save();

        return $person;
    }

    public function update(Person $person, $data)
    {
        $person->update($data);

        return $person;
    }
}
