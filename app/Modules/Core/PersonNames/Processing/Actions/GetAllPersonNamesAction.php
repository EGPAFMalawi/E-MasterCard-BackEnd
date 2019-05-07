<?php

namespace App\Modules\Core\PersonNames\Processing\Actions;

use App\Modules\Core\PersonNames\Data\Repositories\PersonNameRepository;
use Illuminate\Support\Facades\App;


class GetAllPersonNamesAction
{
    public function run()
    {
        return App::make(PersonNameRepository::class)->getAll();
    }
}
