<?php

namespace App\Repositories\Implementation;

use App\Models\Category;
use App\Repositories\ICategoryRepo;
use App\Trait\Crud;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class CategoryRepo implements ICategoryRepo
{
    use Crud ;

    public function getAllRepo(): Collection  //getAllRepo
    {
        return $this->getAllObject(new Category());
    }

    public function saveRepo(array $data, int $id = null): Category
    {
        if ($id != null) {
            return $this->save(new Category(), $data, $id);
        }
        return $this->save(new Category(), $data);
    }

    public function deleteRepo(int $id): void
    {
        $this->delete(new Category(), $id) ;
    }

    public function getOneRepo(array $data = []): Category
    {
        $category = $this->getOneObject(new Category(), $data) ;
        if ($category == false) {
            return new Category();
        }return $category ;
    }

    /**
     * Get product names by category.
     *
     * @param int $cat_id
     * @return \Illuminate\Support\Collection<array{id:int, name:string}>
     */
    public function getProductNameFromTableCategoryOfProductRepo(int $cat_id): Collection
    {
        return DB::table('category_of_product')
            ->join('products', 'category_of_product.prod_id', '=', 'products.id')
            ->where('category_of_product.cat_id', $cat_id)
            ->get(['products.prod_name' , 'category_of_product.prod_id']);
    }

    public function getDetailsProductFromTableStoreRepo(int $branch_id, int $prod_id): Collection
    {
        return DB::table('stores')
            ->join('products', 'stores.prod_id', '=', 'products.id')
            ->where('stores.branch_id', $branch_id)
            ->where('stores.prod_id', $prod_id)
            ->get();
    }
}
