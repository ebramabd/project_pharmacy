<?php

namespace App\Repositories;

interface IAuthRepo
{
    public function register($data) ;
    public function loginRepo($data);
}
