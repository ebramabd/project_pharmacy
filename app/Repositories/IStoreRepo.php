<?php

namespace App\Repositories;

use App\Models\Store;
use \Illuminate\Support\Collection;

interface IStoreRepo
{
//    public function getAllRepo():\Illuminate\Support\Collection;
    public function saveRepo(array $data ,int $id = null): void ;
    public function getNameProductBranchRepo():Collection ;
    public function getOneRepo(array $data = []):Store;
}
