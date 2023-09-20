<?php

namespace Crm\Customer\Requests;
use Crm\Base\Requests\ApiRequest;

use Illuminate\Contracts\Validation\ValidationRule;

class NoteRequest extends ApiRequest
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
            'note' => 'required|min:3'
        ];
    }

    public function messages()
    {
        return [
            'note.required' => 'Note Required',
            'note.min:3' => 'Note Must Be More Than 3',

        ];
    }
}
