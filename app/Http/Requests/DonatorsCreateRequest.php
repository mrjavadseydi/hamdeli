<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DonatorsCreateRequest extends FormRequest
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
            'name'=>'required',
            'mobile'=>'required|numeric',
            'password'=>'required|min:5|max:999999',
            'type'=>'required',
            'description'=>'required',
        ];
    }
}
