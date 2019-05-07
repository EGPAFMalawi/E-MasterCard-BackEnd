<?php

namespace App\Modules\Core\ConceptNames\Data\Models;

use App\Modules\Core\Concepts\Data\Models\Concept;
use Illuminate\Database\Eloquent\Model;

class ConceptName extends Model
{
    protected $table = 'concept_name';
    protected $primaryKey = 'concept_name_id';

    const CREATED_AT = 'date_created';
    const UPDATED_AT = null;


    public function concept()
    {
        return $this->belongsTo(Concept::class, 'concept_id');
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
        return 'concept_name_id';
    }
}
