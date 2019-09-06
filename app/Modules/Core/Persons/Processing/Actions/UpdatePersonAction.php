<?php

namespace App\Modules\Core\Persons\Processing\Actions;

use App\Modules\Core\PersonAddresses\PersonAddresses;
use App\Modules\Core\PersonNames\PersonNames;
use App\Modules\Core\Persons\Data\Models\Person;
use App\Modules\Core\Persons\Data\Repositories\PersonRepository;
use Illuminate\Support\Facades\App;

class UpdatePersonAction
{
    public function run($data, Person $person)
    {
        PersonNames::update($data, $person->names->first());
        PersonAddresses::update($data, $person->addresses->first());

        $person = App::make(PersonRepository::class)->update($data, $person);

        if ($person->gender == 'M')
            App::make(NullifyPersonPregnantAndBreastFeedingObservationsAction::class)->run($person);

        return $person;
    }
}
