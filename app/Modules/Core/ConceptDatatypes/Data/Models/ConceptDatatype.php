<?php

namespace App\Modules\Core\ConceptDatatypes\Data\Models;

use App\Modules\Core\Concepts\Data\Models\Concept;
use Illuminate\Database\Eloquent\Model;

class ConceptDatatype extends Model
{
    //
    protected $table = 'concept_datatype';
    protected $primaryKey = 'concept_datatype_id';

    const CREATED_AT = 'date_created';
    const UPDATED_AT = null;


    public function concept()
    {
        return $this->hasMany(Concept::class, 'concept_datatype_id');
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
        return 'concept_datatype_id';
    }

}
