<?php

namespace App\Modules\Core\Locations\Data\Models;

use App\Modules\Core\Regions\Data\Models\Region;
use App\Modules\Core\TraditionalAuthorities\Data\Models\TraditionalAuthority;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $table = 'location';
    protected $primaryKey = 'location_id';

    const CREATED_AT = 'date_created';
    const UPDATED_AT = null;


    public function getRouteKey()
    {
        return 'location_id';
    }
}
