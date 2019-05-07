<?php

namespace App\Http\Services;


use App\Patient;
use App\Person;
use Carbon\Carbon;

class PatientService
{

    public function findByID($id)
    {
        return Patient::find($id);
    }

    public function search($searchParam)
    {
        return Patient::orderBy('date_created', 'desc')
            ->orWhereHas('steps', function ($query) use ($searchParam){
                $query->where('art_number', 'like', '%'. $searchParam . '%');
            })
            ->orWhereHas('person', function ($query) use ($searchParam){
                $query->whereHas('names', function ($query) use ($searchParam){
                    $query->where('given_name', 'like', '%'. $searchParam . '%')
                        ->orWhere('middle_name', 'like', '%'. $searchParam . '%')
                        ->orWhere('family_name', 'like', '%'. $searchParam . '%');
                });
            })->distinct()->get();
    }

    public function create(Person $person, $data)
    {
        $patient = new Patient;
        $patient->fill($data);
        $patient->person()->associate($person);

        $patient->save();

        return $patient;
    }

    public function update(Patient $patient, $data)
    {
        $patient->update($data);

        return $patient;
    }

//    public function parseAge(Patient $patient, $data)
//    {
//        $dob = Carbon::today()->subYears($data['age']);
//        $patient->birthdate = $dob->toDateString();
//        return $patient;
//    }
}
