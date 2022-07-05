<?php

namespace App\Http\Requests\Period;

use Illuminate\Foundation\Http\FormRequest;

class StoreSubjectForPeriodRequest extends FormRequest
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
            //
            'subject_id'                =>  'required',
            'number_of_lab_assistant'   =>  'required',
            'class_name_prefix'         =>  ['required', 'in:TPB,R'],
            'number_of_class'           =>  ['required', 'numeric'],
            'exam_start'                =>  ['required', 'date', 'before:exam_end'],
            'exam_end'                  =>  ['required', 'date', 'after:exam_start'],
        ];
    }
}
