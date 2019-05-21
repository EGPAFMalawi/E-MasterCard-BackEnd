<?php

namespace App\Modules\Core\Districts\Clients\API\Controllers;

use App\Http\Controllers\Controller;

use App\Modules\Core\Districts\Clients\API\Resources\DistrictResource;
use App\Modules\Core\Districts\Data\Models\District;
use App\Modules\Core\Districts\Processing\Actions\GetAllDistrictsAction;
use App\Modules\Core\Facilities\Facilities;
use App\Modules\Core\TraditionalAuthorities\TraditionalAuthorities;
use Illuminate\Support\Facades\App;

class DistrictAPIController extends  Controller
{
    public function getAll()
    {
        return DistrictResource::collection(App::make(GetAllDistrictsAction::class)->run());
    }

    public function get(District $district)
    {
        return new DistrictResource($district);
    }

    public function getTraditionalAuthorities(District $district)
    {
        return TraditionalAuthorities::resourceCollection($district->traditionalAuthorities);
    }

    public function getFacilities(District $district)
    {
        return Facilities::resourceCollection($district->facilities);
    }
}
