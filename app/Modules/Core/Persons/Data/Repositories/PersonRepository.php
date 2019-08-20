<?php

namespace App\Modules\Core\Persons\Data\Repositories;

use App\Modules\Core\Persons\Data\Models\Person;
use Carbon\Carbon;

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

        if (isset($data['birthdate']) && $data['birthdate'] != null)
            $person->birthdate = Carbon::parse($data['birthdate']);

        $person->save();

        return $person;
    }

    public function update($data, Person $person)
    {
        $person->fill($data);

        if (isset($data['birthdate']))
            $person->birthdate = Carbon::parse($data['birthdate']);

        $person->save();

        return $person;
    }
}