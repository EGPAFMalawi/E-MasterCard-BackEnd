<?php

namespace App\Modules\Core\Districts\Processing\Actions;

use App\Modules\Core\Districts\Data\Repositories\DistrictRepository;
use Illuminate\Support\Facades\App;


class GetAllDistrictsAction
{
    public function run()
    {
        return App::make(DistrictRepository::class)->getAll();
    }
}
