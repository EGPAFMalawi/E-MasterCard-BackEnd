<?php

namespace App\Modules\Core\Facilities\Data\Repositories;

use App\Modules\Core\Facilities\Data\Models\Facility;

class FacilityRepository {

    public function getAll()
    {
        return Facility::all();
    }

    public function get($id)
    {
        return Facility::find($id);
    }
}