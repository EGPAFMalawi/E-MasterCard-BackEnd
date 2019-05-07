<?php

namespace App\Modules\Core\PersonAddresses\Data\Models;

use App\Modules\Core\Persons\Data\Models\Person;
use Illuminate\Database\Eloquent\Model;

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
        });
    }

    public function getRouteKey()
    {
        return 'person_address_id';
    }
}
