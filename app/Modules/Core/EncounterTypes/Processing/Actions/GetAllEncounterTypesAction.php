<?php

namespace App\Modules\Core\EncounterTypes\Processing\Actions;

use App\Modules\Core\EncounterTypes\Data\Repositories\EncounterTypeRepository;
use Illuminate\Support\Facades\App;


class GetAllEncounterTypesAction
{
    public function run()
    {
        return App::make(EncounterTypeRepository::class)->getAll();
    }
}
