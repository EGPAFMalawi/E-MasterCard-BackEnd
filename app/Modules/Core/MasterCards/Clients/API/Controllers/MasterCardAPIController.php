<?php

namespace App\Modules\Core\MasterCards\Clients\API\Controllers;

use App\Http\Controllers\Controller;

use App\Modules\Core\MasterCards\Clients\API\Resources\MasterCardResource;
use App\Modules\Core\MasterCards\Data\Models\MasterCard;
use App\Modules\Core\MasterCards\Processing\Actions\GetAllMasterCardsAction;
use Illuminate\Support\Facades\App;

class MasterCardAPIController extends  Controller
{
    public function getAll()
    {
        return MasterCardResource::collection(App::make(GetAllMasterCardsAction::class)->run());
    }

    public function get(MasterCard $masterCard)
    {
        return new MasterCardResource($masterCard);
    }
}
