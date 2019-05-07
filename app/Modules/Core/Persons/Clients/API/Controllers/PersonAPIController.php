<?php

namespace App\Modules\Core\Persons\Clients\API\Controllers;

use App\Http\Controllers\Controller;

use App\Modules\Core\Persons\Clients\API\Resources\PersonResource;
use App\Modules\Core\Persons\Data\Models\Person;
use App\Modules\Core\Persons\Processing\Actions\GetAllPersonsAction;
use Illuminate\Support\Facades\App;

class PersonAPIController extends  Controller
{
    public function getAll()
    {
        return PersonResource::collection(App::make(GetAllPersonsAction::class)->run());
    }

    public function get(Person $person)
    {
        return new PersonResource($person);
    }

    public function update(UpdatePersonRequest $request, Person $Person)
    {
        return new PersonResource(App::make(UpdatePersonAction::class)->run($request->all(), $Person));
    }
}
