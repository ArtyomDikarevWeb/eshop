<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\User\UserStoreRequest;
use App\Http\Resources\UserResource;
use App\Services\Api\UserService;
use Illuminate\Http\JsonResponse;
use Knuckles\Scribe\Attributes\Authenticated;
use Knuckles\Scribe\Attributes\Endpoint;
use Knuckles\Scribe\Attributes\Group;
use Knuckles\Scribe\Attributes\ResponseFromApiResource;
use App\Models\User;

#[Group('Users')]
class UserController extends Controller
{
    #[Endpoint('Create user account')]
    #[Authenticated]
    #[ResponseFromApiResource(UserResource::class, User::class, 201)]
    public function store(UserStoreRequest $request, UserService $service): JsonResponse
    {
        $user = $service->store($request->dto());

        return UserResource::make($user)->response()->setStatusCode(201);
    }
}
