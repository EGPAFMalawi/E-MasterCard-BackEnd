<?php

namespace App\Modules\Core\PersonAddresses\Processing\Actions;

use App\Modules\Core\PersonAddresses\Data\Repositories\PersonAddressRepository;
use Illuminate\Support\Facades\App;


class GetAllPersonAddressesAction
{
    public function run()
    {
        return App::make(PersonAddressRepository::class)->getAll();
    }
}
