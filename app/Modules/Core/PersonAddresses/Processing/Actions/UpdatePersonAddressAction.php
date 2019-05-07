<?php

namespace App\Modules\Core\PersonAddresses\Processing\Actions;

class UpdatePersonAddressAction
{
    public function run($data, $personAddress)
    {
        $personAddress->update($data);

        return $personAddress;
    }
}
