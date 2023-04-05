<?php

namespace App\Http\Requests\Backend;

use App\Http\Requests\Base\BaseRequest;

class AdminRoleRequest extends BaseRequest
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
        return $this->isMethod('post') ? $this->createRule() : $this->updateRule();
    }

    private function createRule(): array
    {
        return [
            'name' => 'required|min:2|max:30|email',
            'guard' => 'required|min:10|max:40',
        ];
    }

    private function updateRule(): array
    {
        return [
            'name' => 'required|min:2|max:30|email',
            'guard' => 'required|min:10|max:40',
        ];
    }
}
