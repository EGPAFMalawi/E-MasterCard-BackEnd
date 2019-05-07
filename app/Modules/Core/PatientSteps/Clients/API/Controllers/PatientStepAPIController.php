<?php

namespace App\Modules\Core\PatientSteps\Clients\API\Controllers;

use App\Http\Controllers\Controller;

use App\Modules\Core\PatientSteps\Clients\API\Requests\StorePatientStepRequest;
use App\Modules\Core\PatientSteps\Clients\API\Requests\UpdatePatientStepRequest;
use App\Modules\Core\PatientSteps\Clients\API\Resources\PatientStepResource;
use App\Modules\Core\PatientSteps\Data\Models\PatientStep;
use App\Modules\Core\PatientSteps\Processing\Actions\CreatePatientStepAction;
use App\Modules\Core\PatientSteps\Processing\Actions\GetAllPatientStepsAction;
use App\Modules\Core\PatientSteps\Processing\Actions\UpdatePatientStepAction;
use Illuminate\Support\Facades\App;

class PatientStepAPIController extends  Controller
{
    public function getAll()
    {
        return PatientStepResource::collection(App::make(GetAllPatientStepsAction::class)->run());
    }

    public function get(PatientStep $patientStep)
    {
        return new PatientStepResource($patientStep);
    }

    public function store(StorePatientStepRequest $request)
    {
        return new PatientStepResource(App::make(CreatePatientStepAction::class)->run($request->all()));
    }

    public function update(UpdatePatientStepRequest $request, PatientStep $patientStep)
    {
        return new PatientStepResource(App::make(UpdatePatientStepAction::class)->run($request->all(), $patientStep));
    }
}
