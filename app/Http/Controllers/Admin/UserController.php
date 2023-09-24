<?php

namespace App\Http\Controllers\Admin;

use App\Actions\Admin\User\StoreUserAction;
use App\Actions\Admin\User\UpdateUserAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreUserRequest;
use App\Http\Requests\Admin\User\UpdateUserRequest;
use App\Models\Role;
use App\Models\User;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class UserController extends Controller
{
    public function index(): View
    {
        $users = User::query()->paginate(15);

        return view('admin.users.index', ['users' => $users]);
    }

    public function show(User $user): View
    {
        return view('admin.users.show', ['user' => $user]);
    }

    public function edit(User $user): View
    {
        $roles = Role::all();

        return view('admin.users.edit', ['user' => $user, 'roles' => $roles]);
    }

    public function update(User $user, UpdateUserRequest $request, UpdateUserAction $action): View
    {
        $updatedUser = $action($user, $request->validated());

        return view('admin.users.edit', ['user' => $updatedUser, 'roles' => Role::all()]);
    }

    public function create(): View
    {
        $roles = Role::all();

        return view('admin.users.create', ['roles' => $roles]);
    }

    public function store(StoreUserRequest $request, StoreUserAction $action): RedirectResponse
    {
        $action($request->validated());

        return response()->redirectTo(route('users.index'));
    }

    public function destroy(User $user): RedirectResponse
    {
        $user->delete();

        return response()->redirectTo(route('users.index'));
    }
}
