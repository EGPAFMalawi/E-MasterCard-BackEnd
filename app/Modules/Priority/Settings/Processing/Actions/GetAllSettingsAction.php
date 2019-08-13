<?php

namespace App\Modules\Priority\Settings\Processing\Actions;

use App\Modules\Priority\Settings\Data\Repositories\SettingRepository;
use Illuminate\Support\Facades\App;

class GetAllSettingsAction
{
    public function run()
    {
        return App::make(SettingRepository::class)->getAll();
    }
}
