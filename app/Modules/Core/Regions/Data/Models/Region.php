<?php

namespace App\Modules\Core\Regions\Data\Models;

use App\Modules\Core\Districts\Data\Models\District;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    //

    protected $table = 'region';
    protected $primaryKey = 'region_id';

    const CREATED_AT = 'date_created';
    const UPDATED_AT = null;

    protected $fillable = ['name'];

    public function districts()
    {
        return $this->hasMany(District::class, 'region_id');
    }


    public function getRouteKey()
    {
        return 'region_id';
    }
}
