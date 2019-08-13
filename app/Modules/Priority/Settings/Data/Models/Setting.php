<?php

namespace App\Modules\Priority\Settings\Data\Models;

use App\Modules\Priority\Modules\Data\Models\Module;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Setting extends Model
{

    protected $table = 'setting';
    protected $primaryKey = 'setting_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'options', 'last_options',
    ];

    protected $casts = [
        'options' => 'array',
        'last_options' => 'array'
    ];
}
