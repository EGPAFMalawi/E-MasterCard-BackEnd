<?php

namespace App\Modules\Core\PersonNames;

use App\Modules\Core\PersonNames\Clients\API\Resources\PersonNameResource;
use App\Modules\Core\PersonNames\Data\Models\PersonName;
use App\Modules\Core\PersonNames\Data\Repositories\PersonNameRepository;
use App\Modules\Core\PersonNames\Processing\Actions\CreatePersonNameAction;
use App\Modules\Core\Persons\Data\Models\Person;
use Illuminate\Support\Facades\App;

class PersonNames{

    public static function repository()
    {
        return App::make(PersonNameRepository::class);
    }

    public static function resource(PersonName $personName)
    {
        return new PersonNameResource($personName);
    }

    public static function resourceCollection($personNames)
    {
        return PersonNameResource::collection($personNames);
    }

    public static function create($data, Person $person)
    {
        return App::make(CreatePersonNameAction::class)->run($data, $person);
    }

}