<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Base\BaseRequest;

class ProfileImageRequest extends BaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth('sanctum')->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'avatar' => 'required|mimes:jpeg,png,jpg,gif|max:2048'
        ];
    }
}
