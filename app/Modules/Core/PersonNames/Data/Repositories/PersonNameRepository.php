<?php

namespace App\Modules\Core\PersonNames\Data\Repositories;

use App\Modules\Core\PersonNames\Data\Models\PersonName;
use App\Modules\Core\Persons\Data\Models\Person;

class PersonNameRepository {

    public function getAll()
    {
        return PersonName::all();
    }

    public function get($id)
    {
        return PersonName::find($id);
    }

    public function getBy($field, $value)
    {
        return PersonName::where($field, $value)->first();
    }

    public function create($data, Person $person)
    {
        $personName = new PersonName;
        $personName->fill($data);

        $personName->person()->associate($person);

        $personName->save();

        return $personName;
    }

    public function update($data, PersonName $personName)
    {
        $personName->update($data);

        return $personName;
    }
}