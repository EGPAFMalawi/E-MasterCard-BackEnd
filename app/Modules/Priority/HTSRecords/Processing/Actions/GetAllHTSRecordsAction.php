<?php

namespace App\Modules\Priority\HTSRecords\Processing\Actions;

use App\Modules\Priority\HTSRecords\Data\Repositories\HTSRecordRepository;
use Illuminate\Support\Facades\App;


class GetAllHTSRecordsAction
{
    public function run()
    {
        return App::make(HTSRecordRepository::class)->getAll();
    }
}
