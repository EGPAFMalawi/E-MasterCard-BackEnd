<?php

namespace App\Modules\Core\Users\Processing\Actions;

class ToggleUserAction
{
    public function run($user)
    {
        $user->status = $user->status == 0? 1:0;

        return $user->save();
    }
}
