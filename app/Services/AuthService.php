<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\PersonalAccessTokenRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthService
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        private UserService $userService,
        private PersonalAccessTokenRepository $tokenRepository
    ) {}

    public function register(array $data): User
    {
        return $this->userService->createUser($data);
    }

    public function login(array $data): array
    {
        $user = User::where('email', $data['email'])->first();

        if (!$user || !Hash::check($data['password'], $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        return [
            'access_token' => $user->createToken($data['email'])->plainTextToken,
        ];
    }

    public function logout(User $user): void
    {
        $tokenId = $user->currentAccessToken()->id;
        $this->tokenRepository->deleteByTokenableIdAndTokenId($user->id, $tokenId);
    }
}
