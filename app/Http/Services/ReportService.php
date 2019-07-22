<?php

namespace App\Http\Services;


use App\Concept;
use App\EncounterType;
use App\Patient;
use Carbon\Carbon;

class ReportService
{

    public function getReport($data)
    {
        $patients = Patient::all();
        $reportPayload = null;

        if ($data['code'] == 1)
        {
            $dueViralLoad = $this->dueViralLoad($patients);

            if ($data['type'] == 'due6Months')
                $reportPayload = $dueViralLoad['due6Months'];
            elseif ($data['type'] == 'due12Months')
                $reportPayload = $dueViralLoad['due12Months'];
            else
                $reportPayload = $dueViralLoad['dueAfter12Months'];
        }elseif ($data['code'] == 2)
        {
            $nextAppointmentTomorrow = $this->nextAppointmentTomorrow($patients);
            $reportPayload = $nextAppointmentTomorrow;
        }elseif ($data['code'] == 3)
        {
            $missedAppointments = $this->missedAppointments($patients);
            $reportPayload = $missedAppointments;
        }elseif ($data['code'] == 4)
        {
            $lastViralLoad = $this->lastViralLoad($patients);
            $reportPayload = $lastViralLoad;
        }elseif ($data['code'] == 5)
        {
            $everyoneOnDTG = $this->everyoneOnDTG($patients);
            $reportPayload = $everyoneOnDTG;
        }elseif ($data['code'] == 6)
        {
            $defaulters = $this->defaulters($patients);
            if ($data['type'] == 'PEPFARDefaulters')
                $reportPayload = $defaulters['PEPFARDefaulters'];
            else
                $reportPayload = $defaulters['MOHDefaulters'];

        }elseif ($data['code'] == 7)
        {
            $txCurrent = $this->txCurrent($patients);

            if ($data['type'] == 'PEPFARTXCurrent')
                $reportPayload = $txCurrent['PEPFARTXCurrent'];
            else
                $reportPayload = $txCurrent['MOHTXCurrent'];
        }elseif ($data['code'] == 8)
        {
            $outcomes = $this->txCurrent($patients);

            if ($data['type'] == 'D')
                $reportPayload = $outcomes['D'];
            else if ($data['type'] == 'Def')
                $reportPayload = $outcomes['Def'];
            else if ($data['type'] == 'Stop')
                $reportPayload = $outcomes['Stop'];
            else
                $reportPayload = $outcomes['TO'];
        }

        return $reportPayload;
    }

    public function dueViralLoad($patients)
    {
        $today = Carbon::today();
        $startDateConcept = Concept::find(23);
        $visitDateConcept = Concept::find(32);
        $viralLoadSampleTakenConcept = Concept::find(45);
        $adverseOutcomeConcept = Concept::find(48);
        $encounterType = EncounterType::find(4);


        $due6Months = collect();
        $due12Months = collect();
        $dueAfter12Months = collect();

        foreach ($patients as $patient)
        {
            #Get Last Encounter
            $lastEncounter = $patient->encounters->where('encounter_type', $encounterType->encounter_type_id)->last();

            #Get ConceptObs
            #StartDateObs
            $startDate = $patient->person->observations->where('concept_id', $startDateConcept->concept_id)->last();

            if (is_null($startDate))
                continue;

            if (empty($startDate->value))
            {
                $firstVisitEncounter = $patient->encounters->where('encounter_type', $encounterType->encounter_type_id)->first();
                if (is_null($firstVisitEncounter))
                    continue;

                $startDate = $firstVisitEncounter->observations->where('concept_id',$visitDateConcept->concept_id);
            }
            #VisitDateObs
            $visitDate = $lastEncounter->observations->where('concept_id', $visitDateConcept->concept_id)->first();

            #ViralLoadSampleTakenObs
            $viralLoadSampleTaken = $lastEncounter->observations->where('concept_id', $viralLoadSampleTakenConcept->concept_id)->first();

            #AdverseOutcome
            $adverseOutcome = $lastEncounter->observations->where('concept_id', $adverseOutcomeConcept->concept_id)->first();
            if (is_null($visitDate))
                continue;
            #Get Month Difference for 6,12,After 12
            $parsedVisitDate = Carbon::parse($visitDate->value);
            $dateAfter6Months = Carbon::parse($startDate->value)->addMonth(6);
            $dateAfter12Months = Carbon::parse($startDate->value)->addMonth(12);
            $dateAfter13Months = Carbon::parse($startDate->value)->addMonth(13);
            #Check if Past Today and if not Dead
            if (
                $today->greaterThan($dateAfter6Months) &&
                $today->lessThan($dateAfter12Months) &&
                $viralLoadSampleTaken->value == 'Bled' &&
                $adverseOutcome->value != 'D'
            )
                $due6Months->push($patient);
            elseif (
                $today->greaterThan($dateAfter12Months) &&
                $today->lessThan($dateAfter13Months) &&
                $viralLoadSampleTaken->value == 'Bled' &&
                $adverseOutcome->value != 'D'

            )
                $due12Months->push($patient);
            elseif (
                $today->greaterThan($dateAfter13Months) &&
                $parsedVisitDate->lessThan($dateAfter13Months) &&
                $viralLoadSampleTaken->value == 'Bled' &&
                $adverseOutcome->value != 'D'
            )
                $dueAfter12Months->push($patient);
        };

        return [
            'due6Months' => $due6Months,
            'due12Months' => $due12Months,
            'dueAfter12Months' => $dueAfter12Months
        ];
    }

    public function nextAppointmentTomorrow($patients)
    {
        $tomorrow = Carbon::tomorrow();
        $nextAppointmentDateConcept = Concept::find(47);
        $adverseOutcomeConcept = Concept::find(48);
        $encounterType = EncounterType::find(4);

        $tomorrowsAppointments = collect();

        foreach ($patients as $patient)
        {
            #Get Last Encounter
            $lastEncounter = $patient->encounters->where('encounter_type', $encounterType->encounter_type_id)->last();

            #Get ConceptObs
            #Next Appointment DateObs
            $nextAppointmentDate = $patient->person->observations->where('concept_id', $nextAppointmentDateConcept->concept_id)->first();

            if (is_null($lastEncounter))
                continue;
            #AdverseOutcome
            $adverseOutcome = $lastEncounter->observations->where('concept_id', $adverseOutcomeConcept->concept_id)->first();

            if (is_null($nextAppointmentDate->value))
                continue;

            #Check for Time
            $parsedNextAppointmentDate = Carbon::parse($nextAppointmentDate->value);

            #Check if Past Today and if not Dead
            if (
                $parsedNextAppointmentDate->equalTo($tomorrow) &&
                is_null($adverseOutcome->value)
            )
                $tomorrowsAppointments->push($patient);
        };

        return $tomorrowsAppointments;
    }

    public function missedAppointments($patients, $days = 14)
    {
        $today = Carbon::today();
        $nextAppointmentDateConcept = Concept::find(47);
        $adverseOutcomeConcept = Concept::find(48);
        $encounterType = EncounterType::find(4);

        $missedAppointments = collect();

        foreach ($patients as $patient)
        {
            #Get Last Encounter
            $lastEncounter = $patient->encounters->where('encounter_type', $encounterType->encounter_type_id)->last();
            if (is_null($lastEncounter))
                continue;

            #Get ConceptObs
            #Next Appointment DateObs
            $nextAppointmentDate = $lastEncounter->observations->where('concept_id', $nextAppointmentDateConcept->concept_id)->first();

            #AdverseOutcome
            $adverseOutcome = $lastEncounter->observations->where('concept_id', $adverseOutcomeConcept->concept_id)->first();

            if (is_null($nextAppointmentDate))
                continue;

            if (is_null($nextAppointmentDate->value))
                continue;

            #Check for Time
            $parsedNextAppointmentDate = Carbon::parse($nextAppointmentDate->value);

            #Check if Past Today and if not Dead
            if (
                $parsedNextAppointmentDate->addDays($days)->lessThan($today) &&
                is_null($adverseOutcome->value)
            )
                $missedAppointments->push($patient);
        };

        return $missedAppointments;
    }

    public function lastViralLoad($patients)
    {
        $lastViralLoadConcept = Concept::find(46);
        $adverseOutcomeConcept = Concept::find(48);
        $encounterType = EncounterType::find(4);

        $lastViralLoadOver1000 = collect();

        foreach ($patients as $patient)
        {
            #Get Last Encounter
            $lastEncounter = $patient->encounters->where('encounter_type', $encounterType->encounter_type_id)->last();
            if (is_null($lastEncounter))
                continue;

            #Get ConceptObs
            #Last ViralLoad Obs
            $lastViralLoad = $lastEncounter->observations->where('concept_id', $lastViralLoadConcept->concept_id)->first();

            #AdverseOutcome
            $adverseOutcome = $lastEncounter->observations->where('concept_id', $adverseOutcomeConcept->concept_id)->first();

            if (is_null($lastViralLoad))
                continue;

            if (is_null($lastViralLoad->value))
                continue;

            #Check if Past Today and if not Dead
            if (
                $lastViralLoad->value > 1000 &&
                is_null($adverseOutcome->value)
            )
                $lastViralLoadOver1000->push($patient);
        };

        return $lastViralLoadOver1000;
    }

    public function everyoneOnDTG($patients)
    {
        $ARTRegimenConcept = Concept::find(39);
        $adverseOutcomeConcept = Concept::find(48);
        $encounterType = EncounterType::find(4);

        $allOnDTG = collect();

        foreach ($patients as $patient)
        {
            #Get Last Encounter
            $lastEncounter = $patient->encounters->where('encounter_type', $encounterType->encounter_type_id)->last();
            if (is_null($lastEncounter))
                continue;

            #Get ConceptObs
            #ART RegimenObs
            $ARTRegimen = $lastEncounter->observations->where('concept_id', $ARTRegimenConcept->concept_id)->first();

            #AdverseOutcome
            $adverseOutcome = $lastEncounter->observations->where('concept_id', $adverseOutcomeConcept->concept_id)->first();

            if (is_null($ARTRegimen))
                continue;
            if (is_null($ARTRegimen->value))
                continue;

            #Check if Past Today and if not Dead
            if (
                (
                    $ARTRegimen->value == '12A' ||
                    $ARTRegimen->value == '13A' ||
                    $ARTRegimen->value == '14A'
                ) &&
                is_null($adverseOutcome->value)
            )
                $allOnDTG->push($patient);
        };

        return $allOnDTG;
    }

    public function defaulters($patients)
    {
        $today = Carbon::today();
        $nextAppointmentDateConcept = Concept::find(47);
        $adverseOutcomeConcept = Concept::find(48);
        $encounterType = EncounterType::find(4);

        $defaultedBy31Days = collect();
        $defaultedBy61Days = collect();

        foreach ($patients as $patient)
        {
            #Get Last Encounter
            $lastEncounter = $patient->encounters->where('encounter_type', $encounterType->encounter_type_id)->last();
            if (is_null($lastEncounter))
                continue;

            #Get ConceptObs
            #Next Appointment DateObs
            $nextAppointmentDate = $lastEncounter->observations->where('concept_id', $nextAppointmentDateConcept->concept_id)->first();

            #AdverseOutcome
            $adverseOutcome = $lastEncounter->observations->where('concept_id', $adverseOutcomeConcept->concept_id)->first();

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
                is_null($adverseOutcome->value)
            )
                $defaultedBy31Days->push($patient);

            if (
                $defaultedBy61->lessThan($today) &&
                is_null($adverseOutcome->value)
            )
                $defaultedBy61Days->push($patient);
        };

        return [
            'PEPFARDefaulters' => $defaultedBy31Days,
            'MOHDefaulters' => $defaultedBy61Days,
        ];
    }

    public function txCurrent($patients)
    {
        $defaulters = $this->defaulters($patients);

        $adverseOutcomeConcept = Concept::find(48);
        $encounterType = EncounterType::find(4);

        $patientsWithoutOutcome = $patients->filter(function ($patient) use ($adverseOutcomeConcept,$encounterType){
            #Get Last Encounter
            $lastEncounter = $patient->encounters->where('encounter_type', $encounterType->encounter_type_id)->last();
            if (is_null($lastEncounter))
                return false;

            #AdverseOutcome
            $adverseOutcome = $lastEncounter->observations->where('concept_id', $adverseOutcomeConcept->concept_id)->first();

            #Check if Past Today and if not Dead
            if (
            is_null($adverseOutcome)
            )
                return true;

            if (
            is_null($adverseOutcome->value)
            )
                return true;

            return false;
        });


        return [
            'PEPFARTXCurrent' => $patientsWithoutOutcome->diff($defaulters['PEPFARDefaulters']),
            'MOHTXCurrent' => $patientsWithoutOutcome->diff($defaulters['MOHDefaulters']),
        ];
    }

    public function outcomeSummary($patients)
    {
        $adverseOutcomeConcept = Concept::find(48);

        $outcomeD = collect();
        $outcomeDef = collect();
        $outcomeStop = collect();
        $outcomeTO = collect();

        foreach ($patients as $patient)
        {
            #Get Last Encounter
            $lastEncounter = $patient->encounters->last();

            #Get ConceptObs
            #AdverseOutcome
            $adverseOutcome = $lastEncounter->observations->where('concept_id', $adverseOutcomeConcept->concept_id)->first();


            #Check if Past Today and if not Dead
            if (
                $adverseOutcome->value == 'D'
            )
                $outcomeD->push($patient);
            elseif (
                $adverseOutcome->value == 'Def'
            )
                $outcomeDef->push($patient);
            elseif (
                $adverseOutcome->value == 'Stop'
            )
                $outcomeStop->push($patient);
            elseif (
                $adverseOutcome->value == 'TO'
            )
                $outcomeTO->push($patient);
        };


        return [
            'D' => $outcomeD,
            'Def' => $outcomeDef,
            'Stop' => $outcomeStop,
            'TO' => $outcomeTO,
        ];
    }
}
