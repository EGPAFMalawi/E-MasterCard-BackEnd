<?php

namespace App\Modules\Priority\Settings\Clients\API\Resources;

use Illuminate\Http\Resources\Json\Resource;

class SettingResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'object' => 'Setting',
            'settingId' => (int)$this->setting_id,
            'name' => $this->name,
            'options' => $this->options,
            'created_at' => (string)$this->created_at,
            'updated_at' => (string)$this->updated_at,
        ];
    }
}
