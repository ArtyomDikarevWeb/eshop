<?php

declare(strict_types=1);

namespace App\Services\Api;

use App\Data\User\UserStoreData;
use App\Models\User;

class UserService
{
    public function store(UserStoreData $data): User
    {
        dd($data);
    }
}
