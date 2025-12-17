<?php

namespace App\Services;

use App\Dtos\AuthDto;

interface IAuthService
{
    public function register($request) ;
    public function loginSer($request) ;
}
