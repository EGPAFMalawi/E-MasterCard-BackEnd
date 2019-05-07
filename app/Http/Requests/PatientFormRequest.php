<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PatientFormRequest extends FormRequest
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
        return [
            'prefix' => 'sometimes|string|nullable|max:10',
            'given_name' => 'required|string|max:50',
            'middle_name' => 'required|string|max:50',
            'family_name' => 'required|string|max:50',
            'gender' => 'required|string|max:50',
            'birthdate' => 'sometimes|date|before:now|nullable',
            'tribe' => 'sometimes|string|nullable',
            'guardian_name' => 'sometimes|string|max:50|nullable',
            'patient_phone' => 'sometimes|digits:10|nullable',
            'guardian_phone' => 'sometimes|digits:10|nullable',
            'follow_up' => 'sometimes|string|nullable',
            'guardian_relation' => 'sometimes|string|nullable',
            'region' => 'sometimes|string|nullable',
            'city_village' => 'sometimes|string|nullable',
            'county_district' => 'sometimes|string|nullable',
            'neighborhood_cell' => 'sometimes|string|nullable',
            'township_division' => 'sometimes|string|nullable'
        ];
    }
}
