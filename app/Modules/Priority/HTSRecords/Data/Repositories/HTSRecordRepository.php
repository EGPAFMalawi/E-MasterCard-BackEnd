<?php

namespace App\Modules\Priority\HTSRecords\Data\Repositories;

use App\Modules\Priority\HTSRecords\Data\Models\HTSRecord;


class HTSRecordRepository {

    public function getAll()
    {
        return HTSRecord::all();
    }

    public function get($id)
    {
        return HTSRecord::find($id);
    }

    public function getBy($field, $value)
    {
        return HTSRecord::where($field, $value)->first();
    }

    public function getAllBy($field, $value)
    {
        return HTSRecord::where($field, $value)->get();
    }

    public function create($data)
    {
        $HTSRecord = new HTSRecord;
        $HTSRecord->fill($data);

        $HTSRecord->save();

        return $HTSRecord;
    }

    public function update($data, HTSRecord $HTSRecord)
    {
        $HTSRecord->update($data);

        return $HTSRecord;
    }
}