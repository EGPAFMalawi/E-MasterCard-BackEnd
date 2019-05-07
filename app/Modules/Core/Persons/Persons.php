<?php

namespace App\Modules\Core\Persons;

use App\Modules\Core\Persons\Clients\API\Resources\PersonResource;
use App\Modules\Core\Persons\Data\Models\Person;
use App\Modules\Core\Persons\Data\Repositories\PersonRepository;
use App\Modules\Core\Persons\Processing\Actions\CreatePersonAction;
use Illuminate\Support\Facades\App;

class Persons{

    public static function repository()
    {
        return App::make(PersonRepository::class);
    }

    public static function resource(Person $person)
    {
        return new PersonResource($person);
    }

    public static function resourceCollection($persons)
    {
        return PersonResource::collection($persons);
    }

    public static function create($data)
    {
        return App::make(CreatePersonAction::class)->run($data);
    }

}