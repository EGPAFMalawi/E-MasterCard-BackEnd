<?php

namespace App\Modules\Core\MasterCards;

use App\Modules\Core\MasterCards\Clients\API\Resources\MasterCardResource;
use App\Modules\Core\MasterCards\Data\Models\MasterCard;
use App\Modules\Core\MasterCards\Data\Repositories\MasterCardRepository;
use Illuminate\Support\Facades\App;

class MasterCards{

    public static function repository()
    {
        return App::make(MasterCardRepository::class);
    }

    public static function resource(MasterCard $masterCard)
    {
        return new MasterCardResource($masterCard);
    }

    public static function resourceCollection($masterCards)
    {
        return MasterCardResource::collection($masterCards);
    }

}