<?php

namespace App\Modules\Core\PatientIdentifiers\Clients\API\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePatientIdentifierRequest extends FormRequest
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
      return config('patient-identifiers.validation_rules.update');
    }
}
