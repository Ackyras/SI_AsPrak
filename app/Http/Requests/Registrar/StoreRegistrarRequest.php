<?php

namespace App\Http\Requests\Registrar;

use Illuminate\Foundation\Http\FormRequest;

class StoreRegistrarRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //
            'name'          =>  'required',
            'email'         =>  'required|email',
            'nim'           =>  'required|numeric',
            'cv'            =>  'required|file',
            'khs'           =>  'required|file',
            'transkrip'     =>  'required|file',
            'subject.*'     =>  'required|max:3'
        ];
    }
}
