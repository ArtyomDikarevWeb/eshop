<?php

namespace App\Actions\Admin\Role;

use App\Models\Role;

class UpdateRoleAction
{
    public function __invoke(Role $role, array $request): Role
    {
        $role->fill($request);
        $role->save();

        return $role;
    }
}