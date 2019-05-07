<?php

namespace App\Modules\Core\Persons\Processing\Actions;

use App\Modules\Core\Persons\Data\Repositories\PersonRepository;
use Illuminate\Support\Facades\App;


class GetAllPersonsAction
{
    public function run()
    {
        return App::make(PersonRepository::class)->getAll();
    }
}
