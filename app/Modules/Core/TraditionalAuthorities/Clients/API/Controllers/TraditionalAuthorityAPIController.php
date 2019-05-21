<?php

namespace App\Modules\Core\TraditionalAuthorities\Clients\API\Controllers;

use App\Http\Controllers\Controller;

use App\Modules\Core\TraditionalAuthorities\Clients\API\Resources\TraditionalAuthorityResource;
use App\Modules\Core\TraditionalAuthorities\Data\Models\TraditionalAuthority;
use App\Modules\Core\TraditionalAuthorities\Processing\Actions\GetAllTraditionalAuthoritiesAction;
use App\Modules\Core\Villages\Villages;
use Illuminate\Support\Facades\App;

class TraditionalAuthorityAPIController extends  Controller
{
    public function getAll()
    {
        return TraditionalAuthorityResource::collection(App::make(GetAllTraditionalAuthoritiesAction::class)->run());
    }

    public function get(TraditionalAuthority $traditionalAuthority)
    {
        return new TraditionalAuthorityResource($traditionalAuthority);
    }

    public function getVillages(TraditionalAuthority $traditionalAuthority)
    {
        return Villages::resourceCollection($traditionalAuthority->villages);
    }
}
