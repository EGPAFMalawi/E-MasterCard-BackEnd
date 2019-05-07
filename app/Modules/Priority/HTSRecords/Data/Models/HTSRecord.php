<?php

namespace App\Modules\Priority\HTSRecords\Data\Models;

use App\Modules\Core\Patients\Data\Models\Patient;
use Illuminate\Database\Eloquent\Model;

class HTSRecord extends Model
{
    //
    protected $table = 'hts_record';
    protected $primaryKey = 'hts_record_id';

    protected $fillable = ['age', 'sex', 'status', 'modality'];

}
