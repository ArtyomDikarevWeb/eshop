<?php

namespace App\Services\Api;

use App\Data\AuthData;
use App\Http\Contracts\AuthServiceContract;
use App\Http\Resources\UserResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Tymon\JWTAuth\Exceptions\JWTException;

class AuthService implements AuthServiceContract
{
    public function login(AuthData $data): JsonResponse
    {
        if (! $token = auth()->attempt($data->toArray())) {
            return response()->json(['data' => ['error' => 'Unauthorized']], 401);
        }

        return $this->respondWithToken($token);
    }

    public function me(): JsonResource
    {
        return UserResource::make(auth()->user());
    }

    public function refresh(): JsonResponse
    {
        try {
            return $this->respondWithToken(auth()->refresh());
        } catch (JWTException $e) {
            return response()->json(['data' => ['error' => 'Unauthorized']], 401);
        }
    }

    public function logout(): JsonResponse
    {
        auth()->logout();

        return response()->json(['data' => ['message' => 'Successfully logged out']]);
    }

    private function respondWithToken(string $token): JsonResponse
    {
        return response()->json([
            'data' => [
                'access_token' => $token,
                'token_type' => 'bearer',
                'expires_in' => auth()->factory()->getTTL() * 60,
            ],
        ]);
    }
}
