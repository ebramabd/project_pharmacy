<?php

namespace App\Services\Implementation;

use App\Dtos\AuthDto;
use App\Repositories\IAuthRepo;
use App\Repositories\Implementation\AuthRepository;
use App\Services\IAuthService;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthService implements IAuthService
{


    public function __construct(private IAuthRepo $authRepository)
    {
    }

   public function register($request)
    {
        return $this->authRepository->register([
            'user_name' => $request->user_name,
            'password'  => $request->password, // already hashed
        ]);
    }


    public function loginSer($request)
    {
        return $this->authRepository->loginRepo($request);
    }

}
