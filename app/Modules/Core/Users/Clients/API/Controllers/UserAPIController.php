<?php

namespace App\Modules\Core\Users\Clients\API\Controllers;

use App\Http\Controllers\Controller;
use App\Modules\Core\Users\Clients\API\Requests\ChangeUserPasswordRequest;
use App\Modules\Core\Users\Clients\API\Requests\StoreUserRequest;
use App\Modules\Core\Users\Clients\API\Requests\UpdateUserRequest;
use App\Modules\Core\Users\Clients\API\Resources\UserResource;
use Illuminate\Support\Facades\App;

use App\Modules\Core\Users\Data\Models\User;

use App\Modules\Core\Users\Processing\Actions\ChangeUserPasswordAction;
use App\Modules\Core\Users\Processing\Actions\CreateUserAction;
use App\Modules\Core\Users\Processing\Actions\DeleteUserAction;
use App\Modules\Core\Users\Processing\Actions\GetAllUsersAction;
use App\Modules\Core\Users\Processing\Actions\ToggleUserAction;
use App\Modules\Core\Users\Processing\Actions\UpdateUserAction;

class UserAPIController extends  Controller
{
    public function getAll()
    {
        return UserResource::collection(App::make(GetAllUsersAction::class)->run());
    }

    public function get(User $user)
    {
        return new UserResource($user);
    }

    public function store(StoreUserRequest $request)
    {
        return new UserResource(App::make(CreateUserAction::class)->run($request->all()));
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        return new UserResource(App::make(UpdateUserAction::class)->run($request->all(), $user));
    }

    public function toggle(User $user)
    {
        App::make(ToggleUserAction::class)->run($user);

        return response('Success',204);
    }

    public function changePassword(ChangeUserPasswordRequest $request, User $user)
    {
        App::make(ChangeUserPasswordAction::class)->run($user, $request->password);

        return response('Success',204);
    }


}
