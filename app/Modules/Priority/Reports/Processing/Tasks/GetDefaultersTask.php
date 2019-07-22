<?php

namespace App\Modules\Priority\Reports\Processing\Tasks;

use App\Modules\Core\Concepts\Concepts;
use App\Modules\Core\EncounterTypes\EncounterTypes;
use App\Modules\Core\MasterCards\MasterCards;
use App\Modules\Core\Patients\Patients;
use Carbon\Carbon;
use Illuminate\Support\Collection;

class GetDefaultersTask
{
    public function run(Collection $patients)
    {
        $today = Carbon::today();
        $conceptRepo = Concepts::repository();

        $nextAppointmentDateConcept = $conceptRepo->get(47);

        $encounterType = EncounterTypes::repository()->get(4);

        $defaultedBy31Days = collect();
        $defaultedBy61Days = collect();

        foreach ($patients as $patient)
        {
            #Get Last Encounter
            $lastPatientCard = $patient->patientCards->sortBy(function ($item){
                return $item->masterCard->version;
            })->last();

            if (is_null($lastPatientCard))
                continue;

            $lastEncounter = $lastPatientCard->encounters->where('encounter_type', $encounterType->encounter_type_id)->last();

            if (is_null($lastEncounter))
                continue;

            #Get ConceptObs
            #Next Appointment DateObs
            $nextAppointmentDate = $lastEncounter->observations->where('concept_id', $nextAppointmentDateConcept->concept_id)->first();

            #AdverseOutcome
            $adverseOutcome = $patient->steps->where('step','Died')->count();

            if (is_null($nextAppointmentDate))
                continue;

            if (is_null($nextAppointmentDate->value))
                continue;

            #Check for Time
            $parsedNextAppointmentDate = Carbon::parse($nextAppointmentDate->value);
            $defaultedBy31 = $parsedNextAppointmentDate->addDays(31);
            $defaultedBy61 = $parsedNextAppointmentDate->addDays(61);

            #Check if Past Today and if not Dead
            if (
                $defaultedBy31->lessThan($today) &&
                $adverseOutcome === 0
            )
                $defaultedBy31Days->push($patient);

            if (
                $defaultedBy61->lessThan($today) &&
                $adverseOutcome === 0
            )
                $defaultedBy61Days->push($patient);
        };

        return [
            'PEPFARDefaulters' => $defaultedBy31Days,
            'MOHDefaulters' => $defaultedBy61Days,
        ];
    }
}
