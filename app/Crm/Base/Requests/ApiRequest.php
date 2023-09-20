<?php

namespace Crm\Base\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;
use Illuminate\Validation\ValidationException;

abstract class ApiRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    abstract public function authorize();

    abstract public function rules();

    protected function failedValidation(Validator $validator)
    {
        $errors = (new ValidationException($validator))->errors();

        if (!empty($errors)) {
            $transformedErrors = [];
            foreach ($errors as $key => $message) {
                $transformedErrors[] = [
                    $key => $message[0]
                ];
            }
        }

        throw new HttpResponseException(
            response()->json([
                'status' => 'error',
                'error' => $transformedErrors

            ],
                JsonResponse::HTTP_BAD_REQUEST
            )
        );
    }

}
