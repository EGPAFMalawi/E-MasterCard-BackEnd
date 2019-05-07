<?php

namespace App\Modules\Core\PersonNames\Clients\API\Controllers;

use App\Http\Controllers\Controller;

use App\Modules\Core\PersonNames\Clients\API\Resources\PersonNameResource;
use App\Modules\Core\PersonNames\Data\Models\PersonName;
use App\Modules\Core\PersonNames\Processing\Actions\GetAllPersonNamesAction;
use Illuminate\Support\Facades\App;

class PersonNameAPIController extends  Controller
{
    public function getAll()
    {
        return PersonNameResource::collection(App::make(GetAllPersonNamesAction::class)->run());
    }

    public function get(PersonName $personName)
    {
        return new PersonNameResource($personName);
    }
}
