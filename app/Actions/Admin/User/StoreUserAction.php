<?php

namespace App\Actions\Admin\User;

use App\Models\User;
use Exception;

class StoreUserAction
{
    public function __invoke(array $validatedData): bool
    {
        if ($validatedData['password'] !== $validatedData['repeat_password']) {
            throw new Exception("Passwords don't match", 400);
        }
        User::query()->createOrFail($validatedData);

        return true;
    }
}
