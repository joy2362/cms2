<?php

namespace App\Http\Requests\Backend;

use App\Http\Requests\Base\BaseRequest;

class AdminPasswordUpdateRequest extends BaseRequest
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
     * @return array
     */
    public function rules(): array
    {
        return [
            'oldPassword' => 'required|min:6|max:20',
            'newPassword' => 'required|min:6|max:20|same:confirmPassword',
            'confirmPassword' => 'required|min:6|max:20',
        ];
    }
}
