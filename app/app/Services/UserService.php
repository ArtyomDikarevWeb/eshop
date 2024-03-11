<?php

declare(strict_types=1);

namespace App\Services;

use App\Http\Requests\Admin\User\StoreUserRequest;
use App\Http\Requests\Admin\User\UpdateUserRequest;
use App\Models\User;

class UserService
{
    public function store(StoreUserRequest $request): bool
    {
        $data = $request->validated();

        if ($data['password'] !== $data['repeat_password']) {
            throw new \Exception("Passwords don't match", 400);
        }

        User::query()->create($data);

        return true;
    }

    public function update(User $user, UpdateUserRequest $request): User
    {
        $user->fill($request->validated());
        $user->save();

        return $user;
    }
}
