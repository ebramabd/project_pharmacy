<?php

namespace Tests\Unit\Stubs;

use App\Dtos\ProductDto;
use App\Dtos\StoreDto;
use App\Models\Category;
use App\Repositories\ICategoryRepo;
use Illuminate\Support\Collection;
use PHPUnit\Framework\TestCase;

class CategoriesStub extends TestCase implements ICategoryRepo
{
    private Collection $catData;

    public function __construct()
    {
        $this->catData = collect([
            (object)[
                'id' => 1,
                'name' => "category1"
            ],
            (object)[
                'id' => 2,
                'name' => "category1"
            ],

        ]);
    }


    /**
    * @return  \Illuminate\Support\Collection<int , Category>
    */
    public function getAllRepo(): Collection
    {
        return $this->catData;
    }

    /**
     * Create or update a category.
     *
     * If $id is provided, the category will be updated.
     * If $id is null, a new category will be created.
     *
     * @param array{
     *     cat_name: string
     * } $data The category data. Requires 'cat_name'.
     *
     * @param int|null $id The category ID (optional).
     *
     * @return \App\Models\Category
     */
    public function saveRepo(array $data, int $id = null): Category
    {
        if ($id) {
            $this->catData->map(function ($item) use ($data, $id) {
                if ($item->id === $id) {
                    $item->name = $data['name'];
                }
            });

            return new Category([
                'id' => $id,
                'name' => $data['name'],
            ]);
        }
        $newId = $this->catData->max('id') + 1;
        $newCategory = (object)[
            'id' => $newId,
            'name' => $data['name'],
        ];
        $this->catData->push($newCategory);
        return new Category([
            'id' => $newId,
            'name' => $data['name'],
        ]);
    }


    /**
     * @param array{
     *     "id":"value"
     *} $data this data not static
     *
     * @return \App\Models\Category
     */
    public function getOneRepo(array $data = []): Category
    {
        $item = $this->catData->firstWhere($data);
        return new Category([
            'id'   => $item->id,
            'name' => $item->name,
        ]);
    }

    /**
     * @param int $id
     */
    public function deleteRepo(int $id): void
    {
        $this->catData->reject(fn($item) => $item->id === $id);
    }

    /**
     * Get product names by category.
     *
     * @param int $cat_id
     * @return \Illuminate\Support\Collection<array{id:int, name:string}>
     */
    public function getProductNameFromTableCategoryOfProductRepo(int $cat_id): Collection
    {
        $collection = collect([
            (object)[
                'cat_id' => 2,
                'prod_id' => 1,
                'prod_name' => "product1"
            ],
            (object)[
                'cat_id' => 3,
                'prod_id' => 2,
                'prod_name' => "product1"
            ]
        ]);

        return $collection->where('cat_id', $cat_id)->values();
    }

     /**
     * @param int $branch_id
     * @param int $prod_id
     *
     * @return \Illuminate\Support\Collection<array{prod_id:int, prod_name:string, branch_id:int}>
    */
    public function getDetailsProductFromTableStoreRepo(int $branch_id, int $prod_id): Collection
    {
        $collection = collect([
            (object)[
                'prod_id' => 1,
                'branch_id' => 1,
                'prod_name' => "product1"
            ],
            (object)[
                'prod_id' => 2,
                'branch_id' => 1,
                'prod_name' => "product2"
            ],
        ]);

        return $collection
            ->where('prod_id', $prod_id)
            ->where('branch_id', $branch_id)
            ->values();
    }

}
