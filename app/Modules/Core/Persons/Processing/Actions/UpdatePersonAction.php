<?php

namespace App\Modules\Core\Persons\Processing\Actions;

class UpdatePersonAction
{
    public function run($data, $person)
    {
        $person->update($data);

        return $person;
    }
}
