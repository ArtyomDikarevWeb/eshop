<?php

namespace App\Http\Requests\Api\User;

use App\Data\User\UserStoreData;
use Illuminate\Foundation\Http\FormRequest;

class UserStoreRequest extends FormRequest
{
    public function authorize(): bool
    {
        return false;
    }


    public function rules(): array
    {
        return [
            'username' => ['required', 'unique', 'string', 'min:6', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['required', 'string', 'min:7', 'max:20'],
            'password' => ['required', 'string', 'min:8', 'max:255'],
            'repeat_password' => ['required', 'string', 'min:8', 'max:255'],
        ];
    }

    public function bodyParameters(): array
    {
        return [
            'username' => [
                'description' => 'Username',
                'example' => 'CoolGuy23',
            ]
        ];
    }

    public function dto(): UserStoreData
    {
        return UserStoreData::from([...$this->validated()]);
    }
}
