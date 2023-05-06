<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Base\BaseRequest;

class ResetPasswordRequest extends BaseRequest
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
     * @return array
     */
    public function rules(): array
    {
        return [
            'email' => 'required|min:2|max:30|email',
            'token' => 'required|min:10|max:40',
            'password' => 'required|min:6|max:20|same:confirmPassword',
            'confirmPassword' => 'required|min:6|max:20',
        ];
    }
}
