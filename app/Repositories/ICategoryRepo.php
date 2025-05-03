<?php

namespace App\Repositories;

use App\Models\Category;
//use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Collection;
interface ICategoryRepo
{
    public function getAllRepo(): Collection ;
    public function saveRepo(array $data ,int $id = null): Category;
    public function getOneRepo(array $data = []): Category ;
    public function deleteRepo(int $id): void;
    public function getProductNameFromTableCategoryOfProductRepo(int $cat_id) : Collection;
    public function getDetailsProductFromTableStoreRepo(int $branch_id ,int $prod_id):Collection;
}
