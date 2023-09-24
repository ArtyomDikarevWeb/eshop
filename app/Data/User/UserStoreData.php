<?php

namespace App\Data\User;

use Spatie\LaravelData\Data;

class UserStoreData extends Data
{
    public string $username;
    public string $email;
    public string $phone;
    public string $password;
    public string $repeat_password;
}
