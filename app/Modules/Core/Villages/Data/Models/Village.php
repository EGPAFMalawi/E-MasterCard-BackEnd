<?php

namespace App\Modules\Core\Villages\Data\Models;

use App\Modules\Core\Regions\Data\Models\Region;
use App\Modules\Core\TraditionalAuthorities\Data\Models\TraditionalAuthority;
use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
    //

    protected $table = 'village';
    protected $primaryKey = 'village_id';

    const CREATED_AT = 'date_created';
    const UPDATED_AT = null;

    protected $fillable = ['name'];

    public function traditionalAuthority()
    {
        return $this->belongsTo(TraditionalAuthority::class, 'traditional_authority_id');
    }

    public function getRouteKey()
    {
        return 'village_id';
    }
}
