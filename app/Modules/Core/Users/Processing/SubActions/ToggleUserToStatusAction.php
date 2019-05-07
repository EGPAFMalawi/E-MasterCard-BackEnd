<?php

namespace App\Modules\Core\Users\Processing\SubActions;

class ToggleUserToStatusAction
{
    public function run($user,$newStatus)
    {
        $user->status = $newStatus;
        $user->save();

        return $user;
    }
}
