<?php

namespace App\Modules\Core\Patients\Clients\API\Controllers;

use App\Http\Controllers\Controller;

use App\Modules\Core\PatientCards\PatientCards;
use App\Modules\Core\Patients\Clients\API\Requests\SearchPatientsRequest;
use App\Modules\Core\Patients\Clients\API\Requests\StorePatientRequest;
use App\Modules\Core\Patients\Clients\API\Requests\UpdatePatientRequest;
use App\Modules\Core\Patients\Clients\API\Resources\PatientResource;
use App\Modules\Core\Patients\Data\Models\Patient;
use App\Modules\Core\Patients\Processing\Actions\CreatePatientAction;
use App\Modules\Core\Patients\Processing\Actions\GetAllPatientsAction;
use App\Modules\Core\Patients\Processing\Actions\SearchPatientsAction;
use App\Modules\Core\Patients\Processing\Actions\UpdatePatientAction;
use App\Modules\Core\PatientSteps\PatientSteps;
use Illuminate\Support\Facades\App;

class PatientAPIController extends  Controller
{
    public function getAll()
    {
        return PatientResource::collection(App::make(GetAllPatientsAction::class)->run());
    }

    public function get(Patient $patient)
    {
        return new PatientResource($patient);
    }

    public function store(StorePatientRequest $request)
    {
        return new PatientResource(App::make(CreatePatientAction::class)->run($request->all()));
    }

    public function update(UpdatePatientRequest $request, Patient $patient)
    {
        return new PatientResource(App::make(UpdatePatientAction::class)->run($request->all(), $patient));
    }

    public function search(SearchPatientsRequest $request)
    {
        $patients = App::make(SearchPatientsAction::class)->run($request->all());

        return PatientResource::collection($patients);
    }

    public function getCards(Patient $patient)
    {
        return PatientCards::resourceCollection($patient->patientCards);
    }

    public function getSteps(Patient $patient)
    {
        return PatientSteps::resourceCollection($patient->steps);
    }
}
