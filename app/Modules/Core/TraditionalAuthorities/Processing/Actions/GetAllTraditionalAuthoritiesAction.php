<?php

namespace App\Modules\Core\TraditionalAuthorities\Processing\Actions;

use App\Modules\Core\TraditionalAuthorities\Data\Repositories\TraditionalAuthorityRepository;
use Illuminate\Support\Facades\App;


class GetAllTraditionalAuthoritiesAction
{
    public function run()
    {
        return App::make(TraditionalAuthorityRepository::class)->getAll();
    }
}
