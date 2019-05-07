<?php

namespace App\Modules\Core\Districts\Data\Models;

use App\Modules\Core\Regions\Data\Models\Region;
use App\Modules\Core\TraditionalAuthorities\Data\Models\TraditionalAuthority;
use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    //

    protected $table = 'district';
    protected $primaryKey = 'district_id';

    const CREATED_AT = 'date_created';
    const UPDATED_AT = null;

    protected $fillable = ['name'];

    public function traditionalAuthorities()
    {
        return $this->hasMany(TraditionalAuthority::class, 'district_id');
    }

    public function region()
    {
        return $this->belongsTo(Region::class, 'region_id');
    }


    public function getRouteKey()
    {
        return 'district_id';
    }
}
