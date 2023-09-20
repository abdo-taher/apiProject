<?php

namespace Crm\Customer\Requests;

use Crm\Base\Requests\ApiRequest;
use Illuminate\Contracts\Validation\ValidationRule;

class BillRequest extends ApiRequest
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
            'billCode' => 'required|min:4'
        ];
    }

    public function messages()
    {
        return
            [
                'billCode.required' => 'Bill Code Required',
                'billCode.min' => 'Bill Code Must More Than 4 Chracter ',
            ];
    }
}
