<?php

namespace App\Modules\Core\Persons\Data\Repositories;

use App\Modules\Core\Persons\Data\Models\Person;

class PersonRepository {

    public function getAll()
    {
        return Person::all();
    }

    public function get($id)
    {
        return Person::find($id);
    }

    public function create($data)
    {
        $person = new Person;
        $person->fill($data);

        $person->save();

        return $person;
    }

    public function update($data, Person $person)
    {
        $person->update($data);

        return $person;
    }
}