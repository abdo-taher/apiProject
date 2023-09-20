<?php

namespace Crm\User\Requests;
use Crm\Base\Requests\ApiRequest;


use Illuminate\Contracts\Validation\ValidationRule;

class UserRequest extends ApiRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name'=>'required|min:5',
            'email'=>'email|unique:users,email'
        ];
    }
}
