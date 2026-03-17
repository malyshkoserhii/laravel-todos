<?php

namespace App\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserRepository
{

    public function __construct() {}

    public function createUser(array $data): User
    {
        return User::create($data);
    }

    public function me(int $userId): User
    {
        return User::findOrFail($userId);
    }
}
