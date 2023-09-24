<?php

namespace App\Http\Controllers\Api;

use App\Actions\Api\StoreUserAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\User\UserStoreRequest;

class UserController extends Controller
{
    public function store(UserStoreRequest $request, StoreUserAction $action): int
    {
        $action($request->dto());

        return 204;
    }
}
