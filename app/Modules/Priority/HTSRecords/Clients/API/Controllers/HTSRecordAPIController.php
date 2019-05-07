<?php

namespace App\Modules\Priority\HTSRecords\Clients\API\Controllers;

use App\Http\Controllers\Controller;

use App\Modules\Priority\HTSRecords\Clients\API\Requests\StoreHTSRecordRequest;
use App\Modules\Priority\HTSRecords\Clients\API\Requests\UpdateHTSRecordRequest;
use App\Modules\Priority\HTSRecords\Clients\API\Resources\HTSRecordResource;
use App\Modules\Priority\HTSRecords\Data\Models\HTSRecord;
use App\Modules\Priority\HTSRecords\Processing\Actions\CreateHTSRecordAction;
use App\Modules\Priority\HTSRecords\Processing\Actions\GetAllHTSRecordsAction;
use App\Modules\Priority\HTSRecords\Processing\Actions\UpdateHTSRecordAction;
use Illuminate\Support\Facades\App;

class HTSRecordAPIController extends  Controller
{
    public function getAll()
    {
        return HTSRecordResource::collection(App::make(GetAllHTSRecordsAction::class)->run());
    }

    public function get(HTSRecord $HTSRecord)
    {
        return new HTSRecordResource($HTSRecord);
    }

    public function store(StoreHTSRecordRequest $request)
    {
        return new HTSRecordResource(App::make(CreateHTSRecordAction::class)->run($request->all()));
    }

    public function update(UpdateHTSRecordRequest $request, HTSRecord $HTSRecord)
    {
        return new HTSRecordResource(App::make(UpdateHTSRecordAction::class)->run($request->all(), $HTSRecord));
    }
}
