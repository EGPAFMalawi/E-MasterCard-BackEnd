<?php

namespace App\Modules\Core\Encounters\Processing\Actions;

use App\Modules\Core\Encounters\Data\Repositories\EncounterRepository;
use Illuminate\Support\Facades\App;


class GetAllEncountersAction
{
    public function run()
    {
        return App::make(EncounterRepository::class)->getAll();
    }
}
