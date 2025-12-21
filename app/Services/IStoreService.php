<?php

namespace App\Services;

use App\Dtos\StoreDto;
use App\Models\Store;
use Illuminate\Support\Collection;

interface IStoreService
{
    //    public function ShowAllServ() ; //get All data
    public function saveServ(StoreDto $dto, int $id = null): Store ; // save and update of data
    public function getOneServ(array $data = []): Store ;
    public function getNameProductBranchService(): Collection ;
}
