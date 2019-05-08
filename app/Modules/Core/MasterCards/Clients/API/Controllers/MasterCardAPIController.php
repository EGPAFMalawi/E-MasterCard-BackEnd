<?php

namespace App\Modules\Core\MasterCards\Clients\API\Controllers;

use App\Http\Controllers\Controller;

use App\Modules\Core\MasterCards\Clients\API\Resources\MasterCardResource;
use App\Modules\Core\MasterCards\Data\Models\MasterCard;


class MasterCardAPIController extends  Controller
{
//    public function getAll()
//    {
//        return MasterCardResource::collection(App::make(GetAllMasterCardsAction::class)->run());
//    }
//
//    public function get(MasterCard $masterCard)
//    {
//        return new MasterCardResource($masterCard->load('encounterTypes.concepts'));
//    }


    public function getAll()
    {
        $masterCards = MasterCard::with('encounterTypes.concepts')->get();

        return MasterCardResource::collection($masterCards);
    }

    public function get(MasterCard $masterCard)
    {
        $masterCard->load('encounterTypes.concepts');

        return new MasterCardResource($masterCard);
    }
}
