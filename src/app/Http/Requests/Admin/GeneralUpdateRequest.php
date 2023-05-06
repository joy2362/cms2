<?php

namespace App\Http\Requests\Admin;

use App\Http\Requests\Base\BaseRequest;

class GeneralUpdateRequest extends BaseRequest
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
            'name' => 'nullable|sometimes|required_without:email|min:2|max:30',
            'email' => 'nullable|sometimes|required_without:name|min:2|max:30|email',
        ];
    }
}
