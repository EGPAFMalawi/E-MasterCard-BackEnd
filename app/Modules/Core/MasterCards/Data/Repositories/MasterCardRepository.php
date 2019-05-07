<?php

namespace App\Modules\Core\MasterCards\Data\Repositories;

use App\Modules\Core\MasterCards\Data\Models\MasterCard;

class MasterCardRepository {

    public function getAll()
    {
        return MasterCard::all();
    }

    public function get($id)
    {
        return MasterCard::find($id);
    }
}