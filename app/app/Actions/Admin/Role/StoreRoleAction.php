<?php

namespace App\Actions\Admin\Role;

use App\Models\Role;

class StoreRoleAction
{
    public function __invoke(array $request): bool
    {
        unset($request['_token'], $request['_method']);
        Role::create($request);

        return true;
    }
}