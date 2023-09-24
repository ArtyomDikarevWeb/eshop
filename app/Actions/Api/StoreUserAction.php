<?php

namespace App\Actions\Api;

use App\Data\User\UserStoreData;

class StoreUserAction
{
    public function __invoke(UserStoreData $data)
    {
        dd($data);
    }
}
