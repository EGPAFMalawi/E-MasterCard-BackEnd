<?php

namespace App\Modules\Core\Users\Processing\Actions;

use App\Modules\Core\Users\Data\Models\User;

class ChangeUserPasswordAction
{
    public function run(User $user, $newPassword)
    {
        $user->password = bcrypt($newPassword);

        return $user->save();
    }
}
