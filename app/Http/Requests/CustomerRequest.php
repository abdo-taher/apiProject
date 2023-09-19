<?php

namespace App\Http\Requests;

class CustomerRequest extends ApiRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name'=>'required'.$this->id,
            'email'=>'required|unique:customers,email'.$this->id,
            'password'=>'required'.$this->id,
        ];
    }
    public function messages()
    {
        return [
            'name.required'=>'name is Required',
            'email.unique'=>'email is Unique',
            'email.required'=>'email is Required',
            'password.required'=>'password is Required',

        ];
    }
}
