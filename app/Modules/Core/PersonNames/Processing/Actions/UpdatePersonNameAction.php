<?php

namespace App\Modules\Core\PersonNames\Processing\Actions;

class UpdatePersonNameAction
{
    public function run($data, $personName)
    {
        $personName->update($data);

        return $personName;
    }
}
