<?php

namespace App\Modules\Core\Users\Processing\Actions;

use App\Modules\Core\Users\Data\Models\User;

class UpdateUserAction
{
    public function run($data, User $user)
    {
        $user->update($data);

        return $user;
    }
}
