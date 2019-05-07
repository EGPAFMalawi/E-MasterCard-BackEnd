<?php

namespace App\Modules\Core\Regions\Data\Repositories;

use App\Modules\Core\Regions\Data\Models\Region;

class RegionRepository {

    public function getAll()
    {
        return Region::all();
    }

    public function get($id)
    {
        return Region::find($id);
    }
}