<?php

namespace App\Http\Services;


use App\Http\Resources\ObservationResource;
use App\MasterCard;
use App\Observation;
use App\Patient;
use App\PatientCard;
use App\Person;

class PatientCardService
{

    public function findById($id)
    {
        return PatientCard::find($id);
    }

    public function findByARTRegNum($patientCard)
    {
        //return PatientCard::where
    }

    public function create(Patient $patient, MasterCard $masterCard)
    {
        $patientCard = new PatientCard;
        $patientCard->patient()->associate($patient);
        $patientCard->masterCard()->associate($masterCard);

        $patientCard->save();

        return $patientCard;
    }

    public function getData(PatientCard $patientCard, $data)
    {
        if ($data['consider-version'])
            $encounters = $patientCard->encounters;
        else
            $encounters = $patientCard->patient->encounters;

        $encounters = $encounters->where('encounter_type', $data['encounter-type']);

        $observations = Observation::whereIn('encounter_id', $encounters->pluck('encounter_id'))->get();

        return ObservationResource::collection($observations);
    }
}
