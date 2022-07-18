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
        return auth()->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name'                  =>  'filled',
            'honor'                 =>  'filled',
            'selection_poster'                =>  ['filled', 'image'],
            'registration_start'    =>  ['filled', 'date', 'before:registration_end'],
            'registration_end'      =>  ['filled', 'date', 'after:registration_start'],
        ];
    }
}
