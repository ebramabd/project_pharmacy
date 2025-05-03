<?php

namespace App\Services;

use App\Dtos\ProductDto;
use App\Dtos\StoreDto;
use App\Dtos\UserDto;
use App\Models\Admin;

interface IUserService
{
//    public function ShowAllService() ;
    public function saveService(UserDto $dto , int $id = null) : Admin ;
    public function deleteService(int $id): void;
    public function getOneService(int $id): Admin;
    public function getBranchNameService(): array;
}
