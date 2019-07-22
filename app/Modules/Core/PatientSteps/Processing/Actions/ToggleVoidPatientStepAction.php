<?php

namespace App\Modules\Core\Encounters\Processing\Actions;

use App\Modules\Core\Encounters\Data\Repositories\EncounterRepository;
use App\Modules\Core\PatientSteps\Data\Models\PatientStep;
use App\Modules\Core\PatientSteps\Data\Repositories\PatientStepRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;


class ToggleVoidPatientStepAction
{
    public function run($data, PatientStep $patientStep)
    {
        if ($data['void'])
        {
            $patientStep->voided = 1;
            $patientStep->voided_by = request()->user()->id;
            $patientStep->date_voided = Carbon::now();
            $patientStep->voided_reason = 'N/A';
        }else{
            $patientStep->voided = 0;
            $patientStep->voided_by = $patientStep->date_voided = $patientStep->voided_reason =null;
        }

        return App::make(PatientStepRepository::class)->update([], $patientStep);
    }
}
