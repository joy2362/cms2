<?php

namespace App\Http\Requests\Backend;

use App\Http\Requests\Base\BaseRequest;

class AdminGeneralUpdateRequest extends BaseRequest
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
            'name' => 'required|min:2|max:30',
            'email' => 'required|min:2|max:30|email',
        ];
    }

}
