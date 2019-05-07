<?php

namespace App\Modules\Priority\HTSRecords\Processing\Actions;

use App\Modules\Priority\HTSRecords\Data\Repositories\HTSRecordRepository;
use Illuminate\Support\Facades\App;


class CreateHTSRecordAction
{
    public function run($data)
    {
        return App::make(HTSRecordRepository::class)->create($data);
    }
}
