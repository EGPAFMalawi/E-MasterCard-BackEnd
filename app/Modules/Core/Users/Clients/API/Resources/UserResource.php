<?php

namespace App\Modules\Core\Users\Clients\API\Resources;

use Illuminate\Http\Resources\Json\Resource;

class UserResource extends Resource
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
            'object' => 'UserResource',
            'userID' => $this->user_id,
            'username' => $this->username,
            'status' => (int)$this->status,
            'last_login' => (string)$this->last_login,
            'created_at' => (string)$this->created_at,
            'updated_at' => (string)$this->updated_at,
        ];
    }
}
