<?php

namespace App\Modules\Priority\ActivityLogs\Clients\API\Resources;

use App\Modules\Core\Encounters\Encounters;
use App\Modules\Core\Patients\Patients;
use App\Modules\Core\Users\Users;
use Illuminate\Http\Resources\Json\Resource;

class   ActivityLogResource extends Resource
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
            'object' => 'ActivityLogResource',
            'activityLogID' => $this->activity_log_id,
            'logName' => $this->logName,
            'description' => $this->description,
            'properties' => $this->properties,
            'modelType' => $this->model_type,
            'model' => $this->model_type == 'Patient'? Patients::resource($this->actualModel):Encounters::resource($this->actualModel),
            'user' => Users::resource($this->user),
            'createdAt' => (string)$this->created_at
        ];
    }
}
