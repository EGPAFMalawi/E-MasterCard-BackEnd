<?php

namespace App\Modules\Core\Districts\Data\Repositories;

use App\Modules\Core\Districts\Data\Models\District;

class DistrictRepository {

    public function getAll()
    {
        return District::all();
    }

    public function get($id)
    {
        return District::find($id);
    }
}