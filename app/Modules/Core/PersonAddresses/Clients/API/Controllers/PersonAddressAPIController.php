<?php

namespace App\Modules\Core\PersonAddresses\Clients\API\Controllers;

use App\Http\Controllers\Controller;

use App\Modules\Core\PersonAddresses\Clients\API\Resources\PersonAddressResource;
use App\Modules\Core\PersonAddresses\Data\Models\PersonAddress;
use App\Modules\Core\PersonAddresses\Processing\Actions\GetAllPersonAddressesAction;
use Illuminate\Support\Facades\App;

class PersonAddressAPIController extends  Controller
{
    public function getAll()
    {
        return PersonAddressResource::collection(App::make(GetAllPersonAddressesAction::class)->run());
    }

    public function get(PersonAddress $personAddress)
    {
        return new PersonAddressResource($personAddress);
    }
}
