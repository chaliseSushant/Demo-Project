<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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

        $rules =  [
            'name'=>'required',
            'phone_no'=>'required',
            'address'=>'required'
        ];
        if($this->all('id') !=null)
            $rules = array_merge($rules,['profile_picture'=>'file|mimes:jpg,jpeg,png']);

        return $rules;
    }
}
