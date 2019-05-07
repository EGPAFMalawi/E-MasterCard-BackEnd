<?php

namespace App\Modules\Core\PatientCards\Clients\API\Controllers;

use App\Http\Controllers\Controller;

use App\Modules\Core\Observations\Observations;
use App\Modules\Core\PatientCards\Clients\API\Requests\GetPatientCardDataRequest;
use App\Modules\Core\PatientCards\Clients\API\Requests\StorePatientCardRequest;
use App\Modules\Core\PatientCards\Clients\API\Resources\PatientCardResource;
use App\Modules\Core\PatientCards\Data\Models\PatientCard;
use App\Modules\Core\PatientCards\Processing\Actions\CreatePatientCardAction;
use App\Modules\Core\PatientCards\Processing\Actions\GetAllPatientCardsAction;
use App\Modules\Core\PatientCards\Processing\Actions\GetPatientCardDataAction;
use Illuminate\Support\Facades\App;

class PatientCardAPIController extends  Controller
{
    public function getAll()
    {
        return PatientCardResource::collection(App::make(GetAllPatientCardsAction::class)->run());
    }

    public function get(PatientCard $patientCard)
    {
        return new PatientCardResource($patientCard);
    }

    public function store(StorePatientCardRequest $request)
    {
        return new PatientCardResource(App::make(CreatePatientCardAction::class)->run($request->all()));
    }

    public function getData(GetPatientCardDataRequest $request, $patientCard)
    {
        $patientData = App::make(GetPatientCardDataAction::class)->run($request->all(), $patientCard);

        return Observations::resourceCollection($patientData);
    }
}
