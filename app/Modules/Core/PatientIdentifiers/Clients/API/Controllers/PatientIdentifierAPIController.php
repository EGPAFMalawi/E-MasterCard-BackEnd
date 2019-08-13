<?php

namespace App\Modules\Core\PatientIdentifiers\Clients\API\Controllers;

use App\Http\Controllers\Controller;

use App\Modules\Core\PatientIdentifiers\Clients\API\Requests\StorePatientIdentifierRequest;
use App\Modules\Core\PatientIdentifiers\Clients\API\Requests\UpdatePatientIdentifierRequest;
use App\Modules\Core\PatientIdentifiers\Clients\API\Resources\PatientIdentifierResource;
use App\Modules\Core\PatientIdentifiers\Data\Models\PatientIdentifier;
use App\Modules\Core\PatientIdentifiers\Processing\Actions\CreatePatientIdentifierAction;
use App\Modules\Core\PatientIdentifiers\Processing\Actions\GetAllPatientIdentifiersAction;
use App\Modules\Core\PatientIdentifiers\Processing\Actions\ToggleVoidPatientIdentifierAction;
use App\Modules\Core\PatientIdentifiers\Processing\Actions\UpdatePatientIdentifierAction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;

class PatientIdentifierAPIController extends  Controller
{
    public function getAll()
    {
        return PatientIdentifierResource::collection(App::make(GetAllPatientIdentifiersAction::class)->run());
    }

    public function get(PatientIdentifier $patientIdentifier)
    {
        return new PatientIdentifierResource($patientIdentifier);
    }

    public function store(StorePatientIdentifierRequest $request)
    {
        return new PatientIdentifierResource(App::make(CreatePatientIdentifierAction::class)->run($request->all()));
    }

    public function update(UpdatePatientIdentifierRequest $request, PatientIdentifier $patientIdentifier)
    {
        return new PatientIdentifierResource(App::make(UpdatePatientIdentifierAction::class)->run($request->all(), $patientIdentifier));
    }
}
