<?php

namespace App\Modules\Core\MasterCards\Processing\Actions;

use App\Modules\Core\MasterCards\Data\Repositories\MasterCardRepository;
use Illuminate\Support\Facades\App;

class GetAllMasterCardsAction
{
    public function run()
    {
        return App::make(MasterCardRepository::class)->getAll();
    }
}
