<?php

namespace App\Http\Services;

use App\MasterCard;

class MasterCardService
{

    public function findByID($id)
    {
        return MasterCard::find($id);
    }

}
