<?php

namespace App\Http\Requests\Period;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePeriodRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'                  =>  'required',
            'registration_start'    =>  ['required', 'date', 'before:registration_end'],
            'registration_end'      =>  ['required', 'date', 'after:registration_start'],
        ];
    }
}
