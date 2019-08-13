<?php

namespace App\Modules\Core\Encounters\Processing\Actions;

use App\Modules\Core\Encounters\Data\Models\Encounter;
use App\Modules\Core\Encounters\Data\Repositories\EncounterRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;


class UpdateEncounterAction
{
    public function run($data, Encounter $encounter, $encounterDatetime = null)
    {
        if (is_null($encounterDatetime))
            $encounterDatetime = $encounter->encounter_datetime;

        return App::make(EncounterRepository::class)->update([], $encounter, $encounterDatetime);
    }
}
