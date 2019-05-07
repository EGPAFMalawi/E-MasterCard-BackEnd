<?php

namespace App\Modules\Core\Patients\Data\Repositories;

use App\Modules\Core\Patients\Data\Models\Patient;
use App\Modules\Core\Persons\Data\Models\Person;

class PatientRepository {

    public function getAll()
    {
        return Patient::all();
    }

    public function get($id)
    {
        return Patient::find($id);
    }

    public function create($data, Person $person)
    {
        $patient = new Patient;
        $patient->fill($data);

        $patient->person()->associate($person);

        $patient->save();

        return $patient;
    }

    public function update($data, Patient $patient)
    {
        $patient->update($data);

        return $patient;
    }

    public function delete(Patient $patient)
    {
        return $patient->delete();
    }

    public function search($searchParameter)
    {
        return Patient::orderBy('date_created', 'desc')
            ->orWhereHas('steps', function ($query) use ($searchParameter){
                $query->where('art_number', 'like', '%'. $searchParameter . '%');
            })
            ->orWhereHas('person', function ($query) use ($searchParameter){
                $query->whereHas('names', function ($query) use ($searchParameter){
                    $query->where('given_name', 'like', '%'. $searchParameter . '%')
                        ->orWhere('middle_name', 'like', '%'. $searchParameter . '%')
                        ->orWhere('family_name', 'like', '%'. $searchParameter . '%');
                });
            })->distinct()->get();
    }
}