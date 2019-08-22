<?php

namespace App\Modules\Core\PersonAddresses\Data\Models;

use App\Modules\Core\Persons\Data\Models\Person;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class PersonAddress extends Model
{
    protected $table = 'person_address';
    protected $primaryKey = 'person_address_id';

    const CREATED_AT = 'date_created';
    const UPDATED_AT = null;

    protected $fillable = [
        'city_village',
        'country_district',
        'region',
        'township_division'
    ];

    public function person()
    {
        return $this->belongsTo(Person::class, 'person_id');
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($instance) {
            $instance->uuid = uuid4();
            $instance->creator = Auth::user()->user_id;
            $instance->date_created = Carbon::now();
        });

        static::updating(function ($instance) {
            $instance->changed_by = Auth::user()->user_id;
            $instance->date_changed = Carbon::now();
        });
    }

    public function getRouteKey()
    {
        return 'person_address_id';
    }
}
