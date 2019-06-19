<?php

namespace App\Modules\Priority\Reports\Processing\Tasks;

use App\Modules\Core\EncounterTypes\Data\Models\EncounterType;
use App\Modules\Core\Patients\Data\Models\Patient;

class GetLastEncounterTask
{
    public function run(Patient $patient, EncounterType $encounterType, $var = null)
    {
        #Get Last Encounter
        $lastPatientCard = $patient->patientCards->sortBy(function ($item){
            return $item->masterCard->version;
        })->last();

        if (is_null($lastPatientCard))
            return null;

        $lastEncounter = $lastPatientCard->encounters->where('encounter_type', $encounterType->encounter_type_id)->last();

        if (is_null($lastEncounter))
            return null;
        else
            return $lastEncounter;
    }
}
