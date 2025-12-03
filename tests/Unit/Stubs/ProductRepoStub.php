<?php

namespace Tests\Unit\Stubs;

use App\Models\Product;
use App\Repositories\IProductRepo;
use Illuminate\Support\Collection;

class ProductRepoStub implements IProductRepo
{
    private Collection $productCollection;

    public function __construct()
    {
        $this->productCollection = collect([
            (object)[
                'prod_id' => 1,
                'prod_name' => 'product1'
            ],
            (object)[
                'prod_id' => 2,
                'prod_name' => 'product2'
            ]
        ]);
    }

    /**
     * @return \Illuminate\Support\Collection<Product>
     */
    public function getAllRepo(): Collection
    {
        return $this->productCollection;
    }

    /**
     * Create or update a product.
     *
     * If $id is provided, the product will be updated.
     * If $id is null, a new product will be created.
     *
     * @param array{
     *     prod_name: string
     * } $data The product data. Requires 'prod_name'.
     *
     * @param int|null $id The product ID (optional).
     *
     * @return \App\Models\Product
     */
    public function saveRepo(array $data, int $id = null): Product
    {
        if ($id) {
            $item = $this->productCollection->firstWhere('prod_id', $id);

            if ($item) {
                $item->prod_name = $data['prod_name'];
            }

            return new Product([
                'prod_id' => $id,
                'prod_name' => $data['prod_name'],
            ]);
        }

        $newId = $this->productCollection->max('prod_id') + 1;
        $newProduct = (object)[
            'prod_id' => $newId,
            'prod_name' => $data['prod_name'],
        ];
        $this->productCollection->push($newProduct);
        return new Product([
            'prod_id' => $newId,
            'prod_name' => $data['prod_name'],
        ]);
    }

    /**
     * @param array{
     *     "id":"value"
     *} $data this data not static
     *
     * @return \App\Models\Product Returns a Product model with the following key properties:
     *  - id: int
     *  - prod_name string
     *
     */
    public function getOneRepo(array $data = []): Product
    {
       $item = $this->productCollection->firstWhere('id', 1);
        return new Product([
            'prod_id'   => $item->id,
            'prod_name' => $item->cat_name,
        ]);
    }

    /**
     * @param int $id
     */

    public function deleteRepo(int $id): void
    {
        $this->productCollection = $this->productCollection->reject(fn($item) => $item->prod_id === $id)->values();
    }

    public function deleteCategoryOfProduct(int $prod_id): void
    {

    }
}
