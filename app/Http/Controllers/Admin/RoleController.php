<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Admin\Role\StoreRoleAction;
use App\Actions\Admin\Role\UpdateRoleAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Roles\StoreRoleRequest;
use App\Http\Requests\Admin\Roles\UpdateRoleRequest;
use App\Models\Role;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index(): View
    {
        $roles = Role::query()->paginate(15);

        return view('admin.roles.index', ['roles' => $roles]);
    }

    public function show(Role $role): View
    {
        return view('admin.roles.show', ['role' => $role]);
    }

    public function edit(Role $role): View
    {
        return view('admin.roles.edit', ['role' => $role]);
    }

    public function update(Role $role, UpdateRoleRequest $request, UpdateRoleAction $action): View
    {
        $updatedRole = $action($role, $request->validated());

        return view('admin.roles.edit', ['role' => $updatedRole]);
    }

    public function create(): View
    {
        return view('admin.roles.create');
    }

    public function store(StoreRoleRequest $request, StoreRoleAction $action): RedirectResponse
    {
        $action($request->validated());

        return response()->redirectTo(route('roles.index'));
    }

    public function destroy(Role $role): RedirectResponse
    {
        $role->delete();

        return response()->redirectTo(route('roles.index'));
    }
}
