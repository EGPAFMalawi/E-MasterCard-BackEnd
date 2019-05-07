<?php

namespace App\Modules\Core\Villages\Data\Repositories;

use App\Modules\Core\Villages\Data\Models\Village;

class VillageRepository {

    public function getAll()
    {
        return Village::all();
    }

    public function get($id)
    {
        return Village::find($id);
    }
}