<?php

namespace App\Services;

use App\Dtos\AuthDto;
use App\Dtos\ProductDto;
use App\Dtos\StoreDto;

interface IAuthService
{
    public function loginServ(AuthDto $dto) ; //get All data
    public function register($request) ;
    public function loginSer($request) ;
}
