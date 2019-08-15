<?php

namespace App\Modules\Core\PatientSteps\Clients\API\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use function PHPSTORM_META\elementType;

class StorePatientStepRequest extends FormRequest
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
        return array_merge(config('patient-steps.validation_rules.store'), [
            'art_number' => [
                'required',
                Rule::unique('patient_step')->where(function ($query){
                    return $query->where('patient_id','!=',$this->patient);
                }),
                Rule::unique('patient_step')->where(function ($query){
                    if ($this->step == 'ART Start')
                        return $query->where('patient_id',$this->patient)
                            ->where('step','ART Start');
                    elseif ($this->step == 'Trans-out')
                        return $query->where('step','Trans-out')
                            ->where('patient_id',$this->patient);
                    else
                        return $query->where('patient_id','!=',$this->patient);
                })
            ]
        ]);
    }
}
