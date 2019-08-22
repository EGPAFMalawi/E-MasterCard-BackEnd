<?php

namespace App\Modules\Core\PatientIdentifierTypes\Data\Models;

use App\Modules\Core\CardMaps\Data\Models\MasterCardMap;
use App\Modules\Core\Concepts\Data\Models\Concept;
use App\Modules\Core\PatientIdentifiers\Data\Models\PatientIdentifier;
use App\Modules\Core\MasterCards\Data\Models\MasterCard;
use App\Modules\Priority\ActivityLogs\ActivityLogs;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class PatientIdentifierType extends Model
{
    protected $table = 'patient_identifier_type';
    protected $primaryKey = 'patient_identifier_type_id';

    const CREATED_AT = 'date_created';
    const UPDATED_AT = null;


    public function patientIdentifiers()
    {
        return $this->hasMany(PatientIdentifier::class, 'patient_identifier_type');
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($instance) {
            $instance->uuid = uuid4();
            $instance->creator = Auth::user()->user_id;
            $instance->date_created = Carbon::now();
        });
    }

    public function getRouteKey()
    {
        return 'patient_identifier_type_id';
    }

}
