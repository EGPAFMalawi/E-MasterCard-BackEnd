<?php

namespace App\Modules\Core\PersonNames\Data\Models;

use App\Modules\Core\Persons\Data\Models\Person;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

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
        return 'person_name_id';
    }

}
