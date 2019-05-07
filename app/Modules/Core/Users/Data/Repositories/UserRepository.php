<?php

namespace App\Modules\Core\Users\Data\Repositories;

use App\Modules\Core\Users\Data\Models\User;
use Carbon\Carbon;

class UserRepository {

    public function getAll()
    {
        return User::all();
    }

    public function get($id)
    {
        return User::find($id);
    }

    public function getBy($field, $value)
    {
        return User::where($field, $value)->first();
    }

    public function create($data)
    {
        $user = new User;
        $user->username = $data['username'];
        $user->password = bcrypt($data['password']);

        $user->status = 1;

        $user->save();

        return $user;
    }

    public function update($data, User $user)
    {
        $user->update($data);

        return $user;
    }

    public function delete(User $user)
    {
        return $user->delete();
    }

    public function updateLastLogin(User $user)
    {
        $user->last_login = Carbon::now();
        $user->save();
    }
}