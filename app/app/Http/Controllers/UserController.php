<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\User\StoreUserRequest;
use App\Http\Requests\Admin\User\UpdateUserRequest;
use App\Models\Role;
use App\Models\User;
use App\Services\UserService;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
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
        return view('admin.users.edit', ['user' => $user, 'roles' => $this->getRoleList()]);
    }

    public function update(User $user, UpdateUserRequest $request, UserService $service): View
    {
        $updatedUser = $service->update($user, $request->validated());

        return view('admin.users.edit', ['user' => $updatedUser, 'roles' => $this->getRoleList()]);
    }

    public function create(): View
    {
        return view('admin.users.create', ['roles' => $this->getRoleList()]);
    }

    public function store(StoreUserRequest $request, UserService $service): RedirectResponse
    {
        $result = $service->store($request);

        return response()->redirectTo(route('users.index'));
    }

    public function destroy(User $user): RedirectResponse
    {
        $user->delete();

        return response()->redirectTo(route('users.index'));
    }

    private function getRoleList(): Collection
    {
        return Role::all();
    }
}
