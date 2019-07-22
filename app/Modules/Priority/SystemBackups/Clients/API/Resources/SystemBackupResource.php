<?php

namespace App\Modules\Priority\SystemBackups\Clients\API\Resources;

use Illuminate\Http\Resources\Json\Resource;

class SystemBackupResource extends Resource
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
            'object' => 'SystemBackupResource',
            'systemBackupID' => $this->system_backup_id,
            'name' => $this->name,
            'createdAt' => (string)$this->created_at
        ];
    }
}
