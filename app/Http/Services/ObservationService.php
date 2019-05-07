<?php

namespace App\Http\Services;

use App\Concept;
use App\EncounterType;
use App\Observation;
use App\Patient;
use App\PatientCard;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;

class ObservationService
{
    public function process($data)
    {
        $patientCard = PatientCard::find($data['patient-card']);
        $patient = $patientCard->patient;
        $groupedData = $this->array_group_by('encounter-type', $data['observations']);
        $encounterService = App::make(EncounterService::class);

        foreach ($groupedData as $key =>  $values)
        {
            $encounterType = EncounterType::find($key);

            $newObservations = array_where($values, function ($val, $k){
                return $val['observation'] == null;
            });

            $oldObservations = array_where($values, function ($val, $k){
                return $val['observation'] != null;
            });

            if (count($newObservations) > 0)
            {
                $encounter = $encounterService->create($patient, $encounterType);

                foreach ($newObservations as $value)
                {
                    $concept = Concept::find($value['concept']);

                    $this->create($concept, $encounter, $value['value'], $patient->person);

                    $patientCard->encounters()->syncWithoutDetaching([$encounter->encounter_id]);
                }
            }

            if(count($oldObservations) > 0)
            {
                foreach ($oldObservations as $value)
                {
                    $concept = Concept::find($value['concept']);

                    $this->update($concept, $value['observation'], $value['value']);
                }
            }
        }

    }

    public function create($concept, $encounter, $value, $person)
    {
        $observation = new Observation;
        $observation->obs_datetime = Carbon::now();

        $observation->person()->associate($person);
        $observation->encounter()->associate($encounter);
        $observation->concept()->associate($concept);

        $observation = $this->fillValue($observation, $concept->datatype, $value);
        $observation->save();

        return $observation;
    }

    public function update($concept, $observationID, $value)
    {
        $observation = Observation::find($observationID);

        $observation = $this->fillValue($observation, $concept->datatype, $value);
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

    public function array_group_by($key, $data) {
        $result = array();

        foreach($data as $val) {
            if(array_key_exists($key, $val)){
                $result[$val[$key]][] = $val;
            }else{
                $result[""][] = $val;
            }
        }

        return $result;
    }
}
