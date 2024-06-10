<?php

namespace App\Http\Requests\Api;

use App\Data\AuthData;
use Illuminate\Foundation\Http\FormRequest;

class AuthRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email' => ['required', 'email', 'min:8', 'max:255'],
            'password' => ['required', 'string', 'min:8', 'max:255'],
        ];
    }

    public function bodyParameters(): array
    {
        return [
            'email' => [
                'description' => 'User email',
                'example' => 'testtest@test.com',
            ],
            'password' => [
                'description' => 'User password',
                'example' => 'password',
            ],
        ];
    }

    public function dto(): AuthData
    {
        return AuthData::from($this->validated());
    }
}
