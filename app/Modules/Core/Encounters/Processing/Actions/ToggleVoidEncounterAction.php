<?php

namespace App\Modules\Core\Encounters\Processing\Actions;

use App\Modules\Core\Encounters\Data\Models\Encounter;
use App\Modules\Core\Encounters\Data\Repositories\EncounterRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\App;


class ToggleVoidEncounterAction
{
    public function run($data, Encounter $encounter)
    {
        if ($data['void'] == true)
        {
            $encounter->voided = 1;
            $encounter->voided_by = request()->user()->id;
            $encounter->date_voided = Carbon::now();
            $encounter->void_reason = 'N/A';
        }else{
            $encounter->voided = 0;
            $encounter->voided_by = $encounter->date_voided = $encounter->void_reason =null;
        }

        return App::make(EncounterRepository::class)->update([], $encounter);
    }
}
