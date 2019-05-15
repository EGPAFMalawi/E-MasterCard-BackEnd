<?php

namespace App\Modules\Priority\HTSRecords\Data\Models;

use Illuminate\Database\Eloquent\Model;

class HTSRecord extends Model
{
    //
    protected $table = 'hts_record';
    protected $primaryKey = 'hts_record_id';

    protected $fillable = ['age', 'sex', 'status', 'modality', 'year', 'month', 'inserted_hts_record_id', 'service_delivery_point'];

}
