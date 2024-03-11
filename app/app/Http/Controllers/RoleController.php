<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\Role\StoreRoleRequest;
use App\Http\Requests\Admin\Role\UpdateRoleRequest;
use App\Models\Role;
use App\Services\RoleService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

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

    public function update(Role $role, UpdateRoleRequest $request, RoleService $service): View
    {
        $updatedRole = $service->update($role, $request->validated());

        return view('admin.roles.edit', ['role' => $updatedRole]);
    }

    public function create(): View
    {
        return view('admin.roles.create');
    }

    public function store(StoreRoleRequest $request, RoleService $service): RedirectResponse
    {
        $service->store($request->validated());

        return response()->redirectTo(route('roles.index'));
    }

    public function destroy(Role $role): RedirectResponse
    {
        $role->delete();

        return response()->redirectTo(route('roles.index'));
    }
}
