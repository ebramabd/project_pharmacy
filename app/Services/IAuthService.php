<?php

namespace App\Services;

use App\Dtos\AuthDto;

interface IAuthService
{
    public function loginServ(AuthDto $dto) ; //get All data
    public function register($request) ;
    public function loginSer($request) ;
}
