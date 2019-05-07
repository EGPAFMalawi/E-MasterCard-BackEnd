<?php

namespace App\Modules\Core\Regions\Processing\Actions;

use App\Modules\Core\Regions\Data\Repositories\RegionRepository;
use Illuminate\Support\Facades\App;


class GetAllRegionsAction
{
    public function run()
    {
        return App::make(RegionRepository::class)->getAll();
    }
}
