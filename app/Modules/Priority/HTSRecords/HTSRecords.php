<?php

namespace App\Modules\Priority\HTSRecords;

use App\Modules\Priority\HTSRecords\Clients\API\Resources\HTSRecordResource;
use App\Modules\Priority\HTSRecords\Data\Models\HTSRecord;
use App\Modules\Priority\HTSRecords\Data\Repositories\HTSRecordRepository;
use Illuminate\Support\Facades\App;

class HTSRecords{

    public static function repository()
    {
        return App::make(HTSRecordRepository::class);
    }

    public static function resource(HTSRecord $HTSRecord)
    {
        return new HTSRecordResource($HTSRecord);
    }

    public static function resourceCollection($HTSRecords)
    {
        return HTSRecordResource::collection($HTSRecords);
    }

}