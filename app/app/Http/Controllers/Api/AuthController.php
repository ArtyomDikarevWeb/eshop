<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\AuthRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;
use Knuckles\Scribe\Attributes\Authenticated;
use Knuckles\Scribe\Attributes\Endpoint;
use Knuckles\Scribe\Attributes\Group;
use Knuckles\Scribe\Attributes\Header;
use Knuckles\Scribe\Attributes\Response;
use Knuckles\Scribe\Attributes\ResponseFromApiResource;

#[Group('Auth')]
class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    #[Endpoint('Login', 'Authorize user')]
    #[Response(
        [
            "data" => [
                'access_token' => "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vdGltZXRyYWNrZXItYmFja2VuZC5sb2NhbGhvc3Q6ODAwMy9hcGkvdjEvYXV0aC9sb2dpbiIsImlhdCI6MTcwODUzMTc1OCwiZXhwIjoxNzA4NTM1MzU4LCJuYmYiOjE3MDg1MzE3NTgsImp0aSI6ImYyQzQ5Wnp5U0xKWGFwR24iLCJzdWIiOiIyMiIsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.CAbPEf7Uj6LhXw1OkVIRpLsZ2993KdkrbYKiEIa5gE8",
                'token_type' => 'bearer',
                'expires_in' => 3600
            ],
        ],
        200,
        "Success"
    )]
    #[Response(
        [
            "data" => [
                'error' => 'Unauthorized',
            ],
        ],
        401,
        "Fail"
    )]
    public function login(AuthRequest $request): JsonResponse
    {
        $data = $request->dto();

        if (! $token = auth()->attempt($data->toArray())) {
            return response()->json(['data' => ['error' => 'Unauthorized']], 401);
        }

        return $this->respondWithToken($token);
    }

    #[Endpoint('Me', 'Get user data')]
    #[Authenticated]
    #[Header('Authorization', 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vdGltZXRyYWNrZXItYmFja2VuZC5sb2NhbGhvc3Q6ODAwMy9hcGkvdjEvYXV0aC9sb2dpbiIsImlhdCI6MTcwODUzMTc1OCwiZXhwIjoxNzA4NTM1MzU4LCJuYmYiOjE3MDg1MzE3NTgsImp0aSI6ImYyQzQ5Wnp5U0xKWGFwR24iLCJzdWIiOiIyMiIsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.CAbPEf7Uj6LhXw1OkVIRpLsZ2993KdkrbYKiEIa5gE8')]
    #[ResponseFromApiResource(
        UserResource::class,
        User::class,
        200,
        "Returns user data"
    )]
    #[Response(
        [
            "data" => [
                'error' => 'Unauthorized',
            ],
        ],
        401,
        "Fail"
    )]
    public function me(): JsonResource
    {
        return UserResource::make(auth()->user());
    }

    #[Endpoint('Logout', 'Flush token')]
    #[Authenticated]
    #[Header('Authorization', 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vdGltZXRyYWNrZXItYmFja2VuZC5sb2NhbGhvc3Q6ODAwMy9hcGkvdjEvYXV0aC9sb2dpbiIsImlhdCI6MTcwODUzMTc1OCwiZXhwIjoxNzA4NTM1MzU4LCJuYmYiOjE3MDg1MzE3NTgsImp0aSI6ImYyQzQ5Wnp5U0xKWGFwR24iLCJzdWIiOiIyMiIsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.CAbPEf7Uj6LhXw1OkVIRpLsZ2993KdkrbYKiEIa5gE8')]
    #[Response(
        [
            "data" => [
                "message" => "Successfully logged out"
            ]
        ],
        200,
        "Returns user data"
    )]
    #[Response(
        [
            "data" => [
                'error' => 'Unauthorized',
            ],
        ],
        401,
        "Fail"
    )]
    public function logout(): JsonResponse
    {
        auth()->logout();

        return response()->json(['data' => ['message' => 'Successfully logged out']]);
    }

    #[Endpoint('Refresh', 'Refresh user token')]
    #[Authenticated]
    #[Header('Authorization', 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vdGltZXRyYWNrZXItYmFja2VuZC5sb2NhbGhvc3Q6ODAwMy9hcGkvdjEvYXV0aC9sb2dpbiIsImlhdCI6MTcwODUzMTc1OCwiZXhwIjoxNzA4NTM1MzU4LCJuYmYiOjE3MDg1MzE3NTgsImp0aSI6ImYyQzQ5Wnp5U0xKWGFwR24iLCJzdWIiOiIyMiIsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.CAbPEf7Uj6LhXw1OkVIRpLsZ2993KdkrbYKiEIa5gE8')]
    #[Response(
        [
            "data" => [
                'access_token' => "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOi8vdGltZXRyYWNrZXItYmFja2VuZC5sb2NhbGhvc3Q6ODAwMy9hcGkvdjEvYXV0aC9sb2dpbiIsImlhdCI6MTcwODUzMTc1OCwiZXhwIjoxNzA4NTM1MzU4LCJuYmYiOjE3MDg1MzE3NTgsImp0aSI6ImYyQzQ5Wnp5U0xKWGFwR24iLCJzdWIiOiIyMiIsInBydiI6IjIzYmQ1Yzg5NDlmNjAwYWRiMzllNzAxYzQwMDg3MmRiN2E1OTc2ZjcifQ.CAbPEf7Uj6LhXw1OkVIRpLsZ2993KdkrbYKiEIa5gE8",
                'token_type' => 'bearer',
                'expires_in' => 3600
            ],
        ],
        200,
        "Success"
    )]
    #[Response(
        [
            "data" => [
                'error' => 'Unauthorized',
            ],
        ],
        401,
        "Fail"
    )]
    public function refresh(): JsonResponse
    {
        return $this->respondWithToken(auth()->refresh());
    }

    protected function respondWithToken($token): JsonResponse
    {
        return response()->json([
            "data" => [
                'access_token' => $token,
                'token_type' => 'bearer',
                'expires_in' => auth()->factory()->getTTL() * 60
            ]
        ]);
    }
}
