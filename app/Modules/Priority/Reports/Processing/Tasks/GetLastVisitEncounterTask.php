<?php

namespace App\Modules\Priority\Reports\Processing\Tasks;

use App\Modules\Core\Encounters\Data\Models\PatientIdentifier;
use App\Modules\Core\EncounterTypes\Data\Models\EncounterType;
use App\Modules\Core\PatientCards\Data\Models\PatientCard;
use App\Modules\Core\Patients\Data\Models\Patient;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class GetLastVisitEncounterTask
{
    public function run(Patient $patient, EncounterType $encounterType, $var = null)
    {
        #Get Last Encounter
        $lastPatientCard = $patient->patientCards->sortByDesc(function ($item){
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

    public function run2()
    {
        $groupedPatientCards = PatientCard::all()->groupBy('patient_id');
        $lastPatientCards = $groupedPatientCards->map(function ($items){
            return $items->sortByDesc('master_card_id')->last();
        });

        $visitEncounters = PatientIdentifier::where('encounter_type', 4)->where('voided', 0)->get();

        $lastVisitEncounters = DB::table('patient_card_map')->whereIn('encounter_id', $visitEncounters->pluck('encounter_id'))
                                    ->whereIn('patient_card_id', $lastPatientCards->pluck('patient_card_id'))
                                    ->get();

        $lastEncounters = $lastVisitEncounters->groupBy('patient_card_id')->map(function ($items){
            return $items->sort()->last();
        });

        return PatientIdentifier::whereIn('encounter_id', $lastEncounters->pluck('encounter_id'))->get();
    }

    public function run3(Carbon $parsedReportDate)
    {
        $groupedEncounters = DB::table('visit_outcome_event')->whereDate('encounter_datetime', '<=', $parsedReportDate)->where('voided',0)->get()->groupBy('person_id');

        $lastVisitEncounterIDs = $groupedEncounters->map(function ($items){
                return $items->sortBy('encounter_datetime')->last();
        })
        ->pluck('encounter_id');

        return $lastVisitEncounterIDs;
    }
}
