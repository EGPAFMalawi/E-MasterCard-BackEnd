<?php

namespace App\Modules\Core\Facilities\Clients\API\Controllers;

use App\Http\Controllers\Controller;

use App\Modules\Core\Facilities\Clients\API\Resources\FacilityResource;
use App\Modules\Core\Facilities\Data\Models\Facility;
use App\Modules\Core\Facilities\Processing\Actions\GetAllFacilitiesAction;
use Illuminate\Support\Facades\App;

class FacilityAPIController extends  Controller
{
    public function getAll()
    {
        return FacilityResource::collection(App::make(GetAllFacilitiesAction::class)->run());
    }

    public function get(Facility $facility)
    {
        return new FacilityResource($facility);
    }
}
