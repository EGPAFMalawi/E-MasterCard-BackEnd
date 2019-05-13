<?php

namespace App\Modules\Core\Observations\Processing\Actions;

use App\Modules\Core\Concepts\Concepts;
use App\Modules\Core\Encounters\Encounters;
use App\Modules\Core\EncounterTypes\EncounterTypes;
use App\Modules\Core\Observations\Data\Repositories\ObservationRepository;
use App\Modules\Core\PatientCards\PatientCards;
use Illuminate\Support\Facades\App;

class ProcessObservationsAction
{
    public function run($data)
    {
        $observationRepo = App::make(ObservationRepository::class);

        $patientCard = PatientCards::repository()->get($data['patient-card']);
        $patient = $patientCard->patient;

        $groupedData = $this->array_group_by('encounter-type', $data['observations']);

        foreach ($groupedData as $key =>  $values)
        {
            $encounterType = EncounterTypes::repository()->get($key);

            $newObservations = array_where($values, function ($val, $k){
                return $val['observation'] == null;
            });

            $oldObservations = array_where($values, function ($val, $k){
                return $val['observation'] != null;
            });

            if (count($newObservations) > 0)
            {
                $encounter = Encounters::create($patient, $encounterType);

                foreach ($newObservations as $value)
                {
                    $concept = Concepts::repository()->get($value['concept']);

                    $observationRepo->create($value, $concept, $encounter, $patient->person);

                    $patientCard->encounters()->syncWithoutDetaching([$encounter->encounter_id]);
                }
            }

            if(count($oldObservations) > 0)
            {
                foreach ($oldObservations as $value)
                {
                    $concept = Concepts::repository()->get($value['concept']);
                    $observation = $observationRepo->get($value['observation']);

                    $observationRepo->update($value, $observation, $concept);
                }
            }
        }
    }

    private function array_group_by($key, $data) {
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
