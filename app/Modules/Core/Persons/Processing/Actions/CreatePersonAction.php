<?php

namespace App\Modules\Core\Persons\Processing\Actions;

use App\Modules\Core\PersonAddresses\PersonAddresses;
use App\Modules\Core\PersonNames\PersonNames;
use App\Modules\Core\Persons\Data\Repositories\PersonRepository;
use Illuminate\Support\Facades\App;


class CreatePersonAction
{
    public function run($data)
    {
        $person = App::make(PersonRepository::class)->create($data);

        PersonNames::create($data, $person);
        PersonAddresses::create($data, $person);

        return $person;
    }
}
