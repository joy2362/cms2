<?php

namespace App\Http\Requests\Base;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Symfony\Component\HttpFoundation\Response;

class BaseRequest extends FormRequest
{
    /**
     * @param Validator $validator
     * @return void
     */
    public function failedValidation(Validator $validator): void
    {
        throw new HttpResponseException(
            response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], Response::HTTP_UNPROCESSABLE_ENTITY)
        );
    }

    /**
     * Handle a failed authorization attempt.
     *
     * @return void
     *
     */
    protected function failedAuthorization(): void
    {
        throw new HttpResponseException(
            response()->json([
                'success' => false,
                'message' => "test"
            ], Response::HTTP_UNAUTHORIZED)
        );
    }
}
