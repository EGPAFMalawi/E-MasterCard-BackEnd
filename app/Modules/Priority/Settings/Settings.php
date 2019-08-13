<?php

namespace App\Modules\Priority\Settings;

use App\Modules\Priority\Settings\Data\Repositories\SettingRepository;
use App\Modules\Priority\Settings\Clients\API\Resources\SettingResource;
use App\Modules\Priority\Settings\Processing\Actions\GetSettingWithKeyAction;
use Illuminate\Support\Facades\App;

class Settings {

    public static function repository()
    {
        return App::make(SettingRepository::class);
    }

    public static function resource($setting)
    {
      return new SettingResource($setting);
    }

    public static function resourceCollection($settings)
    {
      return SettingResource::collection($settings);
    }

    public static function get($moduleSlug, $key)
    {
        return App::make(GetSettingWithKeyAction::class)->run($moduleSlug, $key);
    }
}
