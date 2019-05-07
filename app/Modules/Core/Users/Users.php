<?php

namespace App\Modules\Core\Users;

use App\Modules\Core\Users\Data\Repositories\UserRepository;
use App\Modules\Core\Users\Clients\API\Resources\UserResource;
use Illuminate\Support\Facades\App;

class Users {


    public static function repository()
    {
        return App::make(UserRepository::class);
    }

    public static function resource($user)
    {
      return new UserResource($user);
    }

    public static function resourceCollection($users)
    {
      return UserResource::collection($users);
    }

}
