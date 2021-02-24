<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PoorsCreateRequest extends FormRequest
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
            'person_id'=>'required|numeric|unique:needies,person_id',
            'mobile'=>'required|numeric',
            'bank_info'=>'required',
            'address'=>'required',
            'status'=>'required',
            'leader_status'=>'required',
            'introduc'=>'required',
            'chilename'=>'array',
            'chileid'=>'array',
            'chilename.*'=>'required_if:chilename,array',
            'chileid.*'=>'required_if:chileid,array|numeric|unique:needies,person_id',
        ];
    }

}
