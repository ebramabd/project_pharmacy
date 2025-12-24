<?php

namespace App\Services\Implementation;

use App\Repositories\IAuthRepo;
use App\Services\IAuthService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthService implements IAuthService
{
    public function __construct(private IAuthRepo $authRepo) {}

    public function registerWeb(string $userName, string $password): bool
    {
        if ($this->authRepo->findByUserName($userName)) {
            throw ValidationException::withMessages([
                'user_name' => 'User name already exists'
            ]);
        }

        $user = $this->authRepo->create([
            'user_name' => $userName,
            'password' => Hash::make($password),
            'type' => 'user',
            'branch_id' => null,
        ]);

        Auth::login($user);

        return true;
    }

    public function loginWeb(string $userName, string $password): bool
    {
        return Auth::attempt([
            'user_name' => $userName,
            'password' => $password,
        ]);
    }

    public function registerApi(string $userName, string $password): array
    {
        if ($this->authRepo->findByUserName($userName)) {
            throw ValidationException::withMessages([
                'user_name' => 'User name already exists'
            ]);
        }

        $user = $this->authRepo->create([
            'user_name' => $userName,
            'password'  => Hash::make($password),
            'type'      => 'user',
            'branch_id' => null,
        ]);

        return [
            'token' => $user->createToken('api')->plainTextToken,
            'user'  => $user,
        ];
    }

    public function loginApi(string $userName, string $password): array|false
    {
        $user = $this->authRepo->findByUserName($userName);

        if (!$user || !Hash::check($password, $user->password)) {
            return false;
        }

        $token = $user->createToken('api')->plainTextToken;
        return [
            'token' => $token,
            'user' => $user,
        ];
    }
}
