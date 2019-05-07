<?php

namespace App\Modules\Core\PersonAddresses\Data\Repositories;

use App\Modules\Core\PersonAddresses\Data\Models\PersonAddress;
use App\Modules\Core\Persons\Data\Models\Person;

class PersonAddressRepository {

    public function getAll()
    {
        return PersonAddress::all();
    }

    public function get($id)
    {
        return PersonAddress::find($id);
    }

    public function create($data, Person $person)
    {
        $personAddress = new PersonAddress;
        $personAddress->fill($data);

        $personAddress->person()->associate($person);

        $personAddress->save();

        return $personAddress;
    }

    public function update($data, PersonAddress $personAddress)
    {
        $personAddress->update($data);

        return $personAddress;
    }
}