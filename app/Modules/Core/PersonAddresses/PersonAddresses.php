<?php

namespace App\Modules\Core\PersonAddresses;

use App\Modules\Core\PersonAddresses\Clients\API\Resources\PersonAddressResource;
use App\Modules\Core\PersonAddresses\Data\Models\PersonAddress;
use App\Modules\Core\PersonAddresses\Data\Repositories\PersonAddressRepository;
use App\Modules\Core\PersonAddresses\Processing\Actions\CreatePersonAddressAction;
use App\Modules\Core\Persons\Data\Models\Person;
use Illuminate\Support\Facades\App;

class PersonAddresses{

    public static function repository()
    {
        return App::make(PersonAddressRepository::class);
    }

    public static function resource(PersonAddress $personAddress)
    {
        return new PersonAddressResource($personAddress);
    }

    public static function resourceCollection($personAddresses)
    {
        return PersonAddressResource::collection($personAddresses);
    }

    public static function create($data, Person $person)
    {
        return App::make(CreatePersonAddressAction::class)->run($data, $person);
    }

}