<?php

namespace App\Repositories;

use App\Models\Category;
//use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Collection;

interface ICategoryRepo
{
    /**
    * @return  \Illuminate\Support\Collection<int , Category>
    */
    public function getAllRepo(): Collection ;

    /**
     * Create or update a category.
     *
     * If $id is provided, the category will be updated.
     * If $id is null, a new category will be created.
     *
     * @param array{
     *     cat_name: string
     * } $data  The category data. Requires 'cat_name'.
     *
     * @param int|null $id  The category ID (optional).
     *
     * @return \App\Models\Category
     */
    public function saveRepo(array $data, int $id = null): Category;

    /**
     * @param array{
     *     "id":"value"
     *}$data this data not static
     *
     * @return \App\Models\Category
    */
    public function getOneRepo(array $data = []): Category ;

    /**
     * @param int $id
    */
    public function deleteRepo(int $id): void;

     /**
     * Get product names by category.
     *
     * @param int $cat_id
     * @return \Illuminate\Support\Collection<array{id:int, name:string}>
     */
    public function getProductNameFromTableCategoryOfProductRepo(int $cat_id): Collection;

    /**
     * @param int $branch_id
     * @param int $prod_id
     *
     * @return \Illuminate\Support\Collection<array{id:int, name:string}>
    */
    public function getDetailsProductFromTableStoreRepo(int $branch_id, int $prod_id): Collection;
}
