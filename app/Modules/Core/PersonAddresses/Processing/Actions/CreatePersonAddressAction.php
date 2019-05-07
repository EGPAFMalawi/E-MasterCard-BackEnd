<?php

namespace App\Modules\Core\PersonAddresses\Processing\Actions;

use App\Modules\Core\PersonAddresses\Data\Repositories\PersonAddressRepository;
use Illuminate\Support\Facades\App;


class CreatePersonAddressAction
{
    public function run($data, $person)
    {
        $personAddress = App::make(PersonAddressRepository::class)->create($data,$person);

        return $personAddress;
    }
}
