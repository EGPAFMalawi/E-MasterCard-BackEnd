<?php

namespace App\Modules\Priority\Settings\Clients\API\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Priority\Settings\Clients\API\Requests\StoreSettingRequest;
use App\Modules\Priority\Settings\Clients\API\Requests\UpdateSettingRequest;
use App\Modules\Priority\Settings\Clients\API\Resources\SettingResource;
use App\Modules\Priority\Settings\Data\Models\Setting;
use Illuminate\Support\Facades\App;

use App\Modules\Priority\Settings\Processing\Actions\CreateSettingAction;
use App\Modules\Priority\Settings\Processing\Actions\DeleteSettingAction;
use App\Modules\Priority\Settings\Processing\Actions\GetAllSettingsAction;
use App\Modules\Priority\Settings\Processing\Actions\UpdateSettingAction;

class SettingAPIController extends  Controller
{
    public function getAll()
    {
        return SettingResource::collection(App::make(GetAllSettingsAction::class)->run());
    }

    public function get(Setting $setting)
    {
        return new SettingResource($setting);
    }

    public function update(UpdateSettingRequest $request, Setting $setting)
    {
        return new SettingResource(App::make(UpdateSettingAction::class)->run($request->all(), $setting));
    }
}
