<?php

namespace App\Modules\Core\Users\Processing\Actions;

use App\Modules\Core\Users\Data\Models\User;

class GetAllUsersAction
{
    public function run()
    {
        return User::all();
    }
}
