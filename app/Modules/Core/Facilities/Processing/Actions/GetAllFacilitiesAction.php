<?php

namespace App\Modules\Core\Facilities\Processing\Actions;

use App\Modules\Core\Facilities\Data\Repositories\FacilityRepository;
use Illuminate\Support\Facades\App;


class GetAllFacilitiesAction
{
    public function run()
    {
        return App::make(FacilityRepository::class)->getAll();
    }
}
