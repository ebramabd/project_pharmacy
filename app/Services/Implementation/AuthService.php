<?php

namespace App\Services\Implementation;

use App\Dtos\AuthDto;
use App\Repositories\Implementation\AuthRepository;
use App\Services\IAuthService;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthService implements IAuthService
{
    protected AuthRepository $authRepository ;

    public function __construct(AuthRepository $authRepository)
    {
        $this->authRepository = $authRepository ;
    }

    public function loginServ(AuthDto $dto)
    {
         $user = $this->authRepository->loginRepoWeb($dto->getUserName()) ;
        if (!$user) {
            throw ValidationException::withMessages([
                'username' => 'not found user name'
            ]);
        }
         $credentials = [
            'user_name' => $dto->getUserName(),
            'password' => $dto->getPassword()
        ];

        if (auth()->attempt($credentials)) {
            return auth()->user();
        }
        throw ValidationException::withMessages([
            'password' => 'Incorrect password'
        ]);
    }

    public function register($request)
    {
        $data = [] ;
        $data['user_name'] = $request->user_name ;
        $data['password'] =Hash::make($request->password) ;
        return $this->authRepository->register($data) ;
    }

    public function loginSer($request)
    {
        return $this->authRepository->loginRepo($request);
    }

    public function clientOrderService()
    {

    }
}
