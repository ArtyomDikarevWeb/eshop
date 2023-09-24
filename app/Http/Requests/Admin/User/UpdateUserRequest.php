<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => ['required', 'email', 'required'],
            'phone' => ['required', 'string', 'min:8'],
            'username' => ['nullable', 'string', 'min:6', 'max:20'],
            'password' => ['nullable', 'string', 'min:8', 'max:255'],
            'repeat_password' => ['nullable', 'string', 'min:8', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'role_id' => ['nullable', 'exists:roles,id']
        ];
    }
}
