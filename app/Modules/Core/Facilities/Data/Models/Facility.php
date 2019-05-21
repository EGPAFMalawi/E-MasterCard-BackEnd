<?php

namespace App\Modules\Core\Facilities\Data\Models;

use App\Modules\Core\Districts\Data\Models\District;
use App\Modules\Core\Regions\Data\Models\Region;
use App\Modules\Core\TraditionalAuthorities\Data\Models\TraditionalAuthority;
use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    protected $table = 'facility';
    protected $primaryKey = 'facility_id';

    const CREATED_AT = 'date_created';
    const UPDATED_AT = null;

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id');
    }

    public function getRouteKey()
    {
        return 'facility_id';
    }
}
