<?php

namespace App\Modules\Core\Observations\Clients\API\Controllers;

use App\Http\Controllers\Controller;

use App\Modules\Core\Observations\Clients\API\Requests\StoreObservationRequest;
use App\Modules\Core\Observations\Clients\API\Resources\ObservationResource;
use App\Modules\Core\Observations\Data\Models\Observation;
use App\Modules\Core\Observations\Processing\Actions\ProcessObservationsAction;
use Illuminate\Support\Facades\App;

class ObservationAPIController extends  Controller
{
    public function get(Observation $observation)
    {
        return new ObservationResource($observation);
    }

    public function store(StoreObservationRequest $request)
    {
        App::make(ProcessObservationsAction::class)->run($request->all());

        return response()->json([
            'data' => [
                'message' => 'Observations Synced'
            ]
        ], 200);

    }
}
