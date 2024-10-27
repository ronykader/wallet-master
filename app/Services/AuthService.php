<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthService
{
    /**
     * @param array $credentials
     * @return string
     * @throws ValidationException
     */
    public function login(array $credentials): string
    {
        $user = User::where('email', $credentials['email'])->first();
        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }
        return $user->createToken('my-wallet-user-token')->plainTextToken;
    }

    /**
     * @param User $user
     * @return void
     */
    public function logout(User $user): void
    {
        // Revoke all tokens..
        $user->tokens()->delete();
        // Revoke the current token
        $user->currentAccessToken()->delete();
    }
}
