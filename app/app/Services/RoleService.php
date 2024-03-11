<?php

declare(strict_types=1);

namespace App\Services;

use App\Http\Requests\Admin\Role\StoreRoleRequest;
use App\Models\Role;

class RoleService
{
    public function store(StoreRoleRequest $request): bool
    {
        Role::query()->create($request->validated());

        return true;
    }

    public function update(Role $role, StoreRoleRequest $request): Role
    {
        $role->fill($request->validated());
        $role->save();

        return $role;
    }
}
