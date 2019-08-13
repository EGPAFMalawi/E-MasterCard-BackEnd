<?php

namespace App\Modules\Priority\Reports\Processing\Tasks;

use App\Modules\Core\PatientSteps\Data\Models\PatientStep;

class GetPatientsWithoutAdverseOutcomesTask
{
    public function run($patients)
    {
        $deadPatientSteps = PatientStep::query()->whereIn('patient_id', $patients->pluck('patient_id'))
                                    ->where([['step', 'Died'],['voided', 0]])
                                    ->get();

        return $patients->whereNotIn('patient_id',$deadPatientSteps->pluck('patient_id'));
    }
}
