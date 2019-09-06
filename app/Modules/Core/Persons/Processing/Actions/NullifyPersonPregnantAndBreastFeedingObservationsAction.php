<?php

namespace App\Modules\Core\Persons\Processing\Actions;

use App\Modules\Core\Observations\Data\Models\Observation;
use App\Modules\Core\Observations\Observations;
use App\Modules\Core\PersonAddresses\PersonAddresses;
use App\Modules\Core\PersonNames\PersonNames;
use App\Modules\Core\Persons\Data\Models\Person;
use App\Modules\Core\Persons\Data\Repositories\PersonRepository;
use Illuminate\Support\Facades\App;

class NullifyPersonPregnantAndBreastFeedingObservationsAction
{
    public function run(Person $person)
    {
        $observations = Observation::query()->where('person_id', $person->person_id)->whereIn('concept_id', [11,34])->get();

        foreach ($observations as $observation)
        {
            $observation->value_text = null;
            $observation->save();
        }
    }
}
