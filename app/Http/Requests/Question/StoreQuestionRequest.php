<?php

namespace App\Http\Requests\Question;

use Illuminate\Foundation\Http\FormRequest;

class StoreQuestionRequest extends FormRequest
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
            'text'                  =>  'required',
            'type'                  =>  'required',
            'score'                 =>  'required|numeric',
            'image'                 =>  'nullable',
            'choice.option.*'       =>  'required_if:type,pilihan berganda',
            'choice.text.*'         =>  'required_if:type,pilihan berganda',
            'choice.image.*'        =>  'nullable',
            'choice.is_true.*'             =>  ['required_if:type,choice'],
        ];
    }
}
