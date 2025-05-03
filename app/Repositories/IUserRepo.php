<?php

namespace App\Repositories;

use App\Models\Admin;

interface IUserRepo
{
//    public function getAllRepo();
    public function saveRepo(array $data ,int $id = null): Admin ;
    public function getOneRepo(int $id): Admin;
    public function deleteRepo(int $id): void;
    public function getBranchNameRepo(): array;
}
