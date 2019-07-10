<?php

namespace App\Modules\Priority\HTSRecords\Clients\API\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateHTSRecordRequest extends FormRequest
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
      return array_merge(config('hts-records.validation_rules.update'),[
          'inserted_hts_record_id' => [
              'required',
              Rule::unique('hts_record')->ignore($this->HTSRecord->hts_record_id, 'hts_record_id'),
              'string',
      ]]);
    }
}
