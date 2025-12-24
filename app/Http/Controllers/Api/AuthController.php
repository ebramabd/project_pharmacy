<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Services\IAuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct(private IAuthService $authService) {}

    public function register(Request $request)
    {
        $request->validate([
            'user_name' => 'required|string|unique:users,user_name',
            'password'  => 'required|string|min:6',
        ]);

        return response()->json(
            $this->authService->registerApi(
                $request->user_name,
                $request->password
            ),
            201
        );
    }

    public function login(Request $request)
    {
        $request->validate([
            'user_name' => 'required|string',
            'password'  => 'required|string',
        ]);

        $result = $this->authService->loginApi(
            $request->user_name,
            $request->password
        );

        if (! $result) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        return response()->json($result);
    }

    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json([
            'message' => 'Logged out successfully'
        ]);
    }
}
