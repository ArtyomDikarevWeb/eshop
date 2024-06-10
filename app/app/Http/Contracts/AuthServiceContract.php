<?php

namespace App\Http\Contracts;

use App\Data\AuthData;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\JsonResource;

interface AuthServiceContract
{
    public function login(AuthData $data): JsonResponse;

    public function logout(): JsonResponse;

    public function me(): JsonResource;

    public function refresh(): JsonResponse;
}
