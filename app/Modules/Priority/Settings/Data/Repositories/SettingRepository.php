<?php

namespace App\Modules\Priority\Settings\Data\Repositories;

use App\Modules\Priority\Modules\Data\Models\Module;
use App\Modules\Priority\Settings\Data\Models\Setting;

class SettingRepository {

    public function getAll()
    {
        return Setting::all();
    }

    public function get($id)
    {
        return Setting::find($id);
    }

    public function getBy($field, $value)
    {
        return Setting::where($field, $value)->first();
    }

    public function update($data, Setting $setting)
    {
        $setting->last_options = $setting->options;
        $setting->fill($data);

        $setting->save();

        return $setting;
    }
}
