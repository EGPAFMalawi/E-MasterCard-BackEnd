<?php

namespace App\Modules\Core\PersonNames\Processing\Actions;

use App\Modules\Core\PersonNames\Data\Repositories\PersonNameRepository;
use Illuminate\Support\Facades\App;


class CreatePersonNameAction
{
    public function run($data, $person)
    {
        $personName = App::make(PersonNameRepository::class)->create($data,$person);

        return $personName;
    }
}
