<?php

namespace App\Modules\Core\Locations\Processing\Actions;

use App\Modules\Core\Locations\Data\Repositories\LocationRepository;
use Illuminate\Support\Facades\App;


class GetAllLocationsAction
{
    public function run()
    {
        return App::make(LocationRepository::class)->getAll();
    }
}
