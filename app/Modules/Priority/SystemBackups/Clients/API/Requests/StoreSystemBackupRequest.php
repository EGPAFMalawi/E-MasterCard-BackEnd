<?php

namespace App\Modules\Priority\SystemBackups\Clients\API\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSystemBackupRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
      return config('system-backups.validation_rules.store');
    }
}
