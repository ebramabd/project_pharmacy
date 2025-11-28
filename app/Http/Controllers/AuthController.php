<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\AuthRequest;
use App\Http\Requests\Client\ClientOrderRequest;
use App\Services\Implementation\AuthService;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    protected AuthService $authService;
    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function loginView()
    {
        return view('admin.auth.login') ;
    }

    public function loginWeb(AuthRequest $request)
    {
        $user = $this->authService->loginServ($request->getDto()) ;
        if (!$user) {
            throw ValidationException::withMessages([
                'user' => 'not found user ',
            ]);
        }
        return redirect()->route('afterLogin');
    }

    public function logoutWeb(Request $request)
    {
        auth()->logout();
        return redirect()->route('login');
    }

    public function register(Request $request)
    {
        return $this->authService->register($request) ;
    }

    public function login(Request $request)
    {
        return $this->authService->loginSer($request) ;
    }

    public function logout(Request $request)
    {
        // Revoke all tokens for the user
        $request->user()->tokens()->delete();

        // Return a logout response
        return response()->json([
            'message' => 'Logged out successfully.',
        ]);
    }

    public function order(ClientOrderRequest $request)
    {
        return $request;
        return auth()->user()->id ;
    }
}
