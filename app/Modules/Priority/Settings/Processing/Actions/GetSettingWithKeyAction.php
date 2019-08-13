<?php

namespace App\Modules\Priority\Settings\Processing\Actions;

use App\Modules\Priority\Modules\Modules;

class GetSettingWithKeyAction
{
    public function run($moduleSlug, $key)
    {
        $module = Modules::repository()->getBy('slug',$moduleSlug);

        return $module?array_get($module->setting->options,$key, array_get($module->setting->last_options,$key,null)):null;
    }
}
