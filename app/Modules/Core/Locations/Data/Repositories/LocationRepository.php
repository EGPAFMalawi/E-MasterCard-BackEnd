<?php

namespace App\Modules\Core\Locations\Data\Repositories;

use App\Modules\Core\Locations\Data\Models\Location;

class LocationRepository {

    public function getAll()
    {
        return Location::all();
    }

    public function get($id)
    {
        return Location::find($id);
    }
}