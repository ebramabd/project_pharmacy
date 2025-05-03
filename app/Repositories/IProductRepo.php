<?php

namespace App\Repositories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

interface IProductRepo
{
    public function getAllRepo(): Collection;
    public function saveRepo(array $data ,int $id = null): Product;
    public function getOneRepo(array $data = []): Product;
    public function deleteRepo(int $id): void;
    public function deleteCategoryOfProduct(int $prod_id): void;
}
