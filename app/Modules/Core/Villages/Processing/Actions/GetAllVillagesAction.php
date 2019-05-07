<?php

namespace App\Modules\Core\Villages\Processing\Actions;

use App\Modules\Core\Villages\Data\Repositories\VillageRepository;
use Illuminate\Support\Facades\App;


class GetAllVillagesAction
{
    public function run()
    {
        return App::make(VillageRepository::class)->getAll();
    }
}
