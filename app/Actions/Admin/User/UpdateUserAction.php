<?php

namespace App\Actions\Admin\User;

use App\Models\User;

class UpdateUserAction
{
    public function __invoke(User $user, array $request): User
    {
        $user->fill($request);
        $user->save();

        return $user;
    }
}
