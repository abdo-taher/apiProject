<?php

namespace App\Http\Requests;

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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'billCode'=>'required|min:4'
        ];
    }
    public function messages()
    {
        return
        [
            'billCode.required'=>'Bill Code Required',
            'billCode.min'=>'Bill Code Must More Than 4 Chracter ',
        ];
    }
}
