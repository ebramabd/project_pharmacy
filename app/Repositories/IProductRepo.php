<?php

namespace App\Repositories;

use App\Models\Product;
use Illuminate\Support\Collection;

interface IProductRepo
{
    /**
     * @return \Illuminate\Support\Collection<Product>
     */
    public function getAllRepo(): Collection;

      /**
     * Create or update a product.
     *
     * If $id is provided, the product will be updated.
     * If $id is null, a new product will be created.
     *
     * @param array{
     *     branch_name: string
     * } $data  The product data. Requires 'prod_name'.
     *
     * @param int|null $id  The product ID (optional).
     *
     * @return \App\Models\Product
     */
    public function saveRepo(array $data, int $id = null): Product;

    /**
     * @param array{
     *     "id":"value"
     *} $data this data not static
     *
     * @return \App\Models\Product
     */
    public function getOneRepo(array $data = []): Product;

    /**
     * @param int $id
     */
    public function deleteRepo(int $id): void;

    public function deleteCategoryOfProduct(int $prod_id): void;
}
