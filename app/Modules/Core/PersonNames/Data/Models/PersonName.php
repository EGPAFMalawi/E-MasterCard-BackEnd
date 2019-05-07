<?php

namespace App\Modules\Core\PersonNames\Data\Models;

use App\Modules\Core\Persons\Data\Models\Person;
use Illuminate\Database\Eloquent\Model;

class PersonName extends Model
{
    //
    protected $table = 'person_name';
    protected $primaryKey = 'person_name_id';

    const CREATED_AT = 'date_created';
    const UPDATED_AT = null;

    protected $fillable = ['prefix', 'given_name', 'middle_name', 'family_name'];

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
        return 'person_name_id';
    }

}
