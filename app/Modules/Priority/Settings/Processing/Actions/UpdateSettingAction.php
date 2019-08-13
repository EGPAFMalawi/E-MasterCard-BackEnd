<?php

namespace App\Modules\Priority\Settings\Processing\Actions;

use App\Modules\Priority\Settings\Data\Repositories\SettingRepository;
use App\Modules\Priority\Settings\Data\Models\Setting;
use Illuminate\Support\Facades\App;

class UpdateSettingAction
{
    public function run($data, Setting $setting)
    {
        return App::make(SettingRepository::class)->update($data, $setting);
    }
}
