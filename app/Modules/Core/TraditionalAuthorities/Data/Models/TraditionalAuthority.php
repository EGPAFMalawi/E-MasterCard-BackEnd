<?php

namespace App\Modules\Core\TraditionalAuthorities\Data\Models;

use App\Modules\Core\Districts\Data\Models\District;
use App\Modules\Core\Villages\Data\Models\Village;
use Illuminate\Database\Eloquent\Model;

class TraditionalAuthority extends Model
{
    //
    protected $table = 'traditional_authority';
    protected $primaryKey = 'traditional_authority_id';

    const CREATED_AT = 'date_created';
    const UPDATED_AT = null;

    protected $fillable = ['name'];

    public function villages()
    {
        return $this->hasMany(Village::class, 'traditional_authority_id');
    }

    public function district()
    {
        return $this->belongsTo(District::class, 'district_id');
    }
}
