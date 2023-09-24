<?php

namespace App\Http\Controllers\Api;

use App\Actions\Api\StoreUserAction;
use App\Http\Controllers\Controller;
use App\Http\Requests\Api\User\UserStoreRequest;
use Knuckles\Scribe\Attributes\Endpoint;
use Knuckles\Scribe\Attributes\Group;

#[Group('User')]
class UserController extends Controller
{
    #[Endpoint('Create user account')]
    public function store(UserStoreRequest $request, StoreUserAction $action): int
    {
        $action($request->dto());

        return 204;
    }
}
