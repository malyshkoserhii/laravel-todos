<?php

namespace App\Services;

use App\Http\Resources\UserResource;
use App\Models\User;
use App\Repositories\UserRepository;
use Illuminate\Support\Facades\Auth;

class UserService
{

    public function __construct(private UserRepository $userRepository) {}

    public function createUser(array $data): User
    {
        return $this->userRepository->createUser($data);
    }

    function me(): UserResource
    {
        $userId = Auth::id();
        $user = $this->userRepository->me($userId);
        if (!$user) {
            throw new \Exception('User not found');
        }
        return new UserResource($user);
    }
}
