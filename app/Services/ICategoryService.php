<?php

namespace App\Services;

use App\Dtos\CategoryDto;
use App\Models\Category;
//use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Collection;

interface ICategoryService
{
    public function allCategoryPage(): Collection; //ShowAllServ
    public function categorySave(CategoryDto $dto, int $id = null): Category; //saveServ
    public function getOneCategory(array $data = []): Category;//getOneSer
    public function categoryDelete(int $id): void;//deleteServ
    public function getProductNameFromTableCategoryOfProductService(int $cat_id): Collection ;
    public function getDetailsProductFromTableStoreService(int $branch_id, int $prod_id): collection ;
}
