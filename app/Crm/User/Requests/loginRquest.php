<?php

namespace App\Crm\User\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Crm\Base\Requests\ApiRequest;

class loginRquest extends ApiRequest
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
            'email'=>'email|max:30',
            'password'=>'required|min:6|max:30'
        ];
    }
}
