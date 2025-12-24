<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\IAuthService;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function __construct(private IAuthService $authService) {}

    public function loginView()
    {
        return view('admin.auth.login');
    }

    public function registerView()
    {
        return view('admin.auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'user_name' => 'required|string|unique:users,user_name',
            'password'  => 'required|string|min:6|confirmed',
        ]);

        $this->authService->registerWeb(
            $request->user_name,
            $request->password
        );

        return redirect()->route('afterLogin');
    }

    public function login(Request $request)
    {
        $request->validate([
            'user_name' => 'required|string',
            'password'  => 'required|string',
        ]);

        if (! $this->authService->loginWeb(
            $request->user_name,
            $request->password
        )) {
            return back()->withErrors([
                'user_name' => 'Invalid credentials'
            ]);
        }

        return redirect()->route('afterLogin');
    }

    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();

        return redirect()->route('login');
    }
}
