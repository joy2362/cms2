<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Base\BaseRequest;

class LoginRequest extends BaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|min:2|max:30|email',
            'password' => 'required|min:6|max:25',
        ];
    }
}
