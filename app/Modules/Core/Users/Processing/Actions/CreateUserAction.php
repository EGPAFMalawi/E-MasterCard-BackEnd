<?php

namespace App\Modules\Core\Users\Processing\Actions;

use App\Modules\Core\Users\Data\Repositories\UserRepository;
use App\Modules\Core\Users\Processing\Tasks\GenerateRandomUserPasswordTask;
use Illuminate\Support\Facades\App;

/**
 * Class CreateUserAction
 *
 * Action Creates a New User from the Username parameter.
 * The New User has a random 8 Character Password and
 * is deactivated by Default.
 *
 * @package App\Modules\Core\Users\Processing\Actions
 */

class CreateUserAction
{
    public function run($data)
    {
        return App::make(UserRepository::class)->create($data);
    }
}
