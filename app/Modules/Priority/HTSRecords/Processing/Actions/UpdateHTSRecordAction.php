<?php

namespace App\Modules\Priority\HTSRecords\Processing\Actions;

class UpdateHTSRecordAction
{
    public function run($data, $HTSRecord)
    {
        $HTSRecord->update($data);

        return $HTSRecord;
    }
}
