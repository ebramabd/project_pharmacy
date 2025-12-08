<?php

namespace Tests\Unit\Stubs;

use App\Models\Store;
use App\Repositories\IStoreRepo;
use Illuminate\Support\Collection;
use PHPUnit\Framework\TestCase;

class StoreRepoStub implements IStoreRepo
{
    private Collection $storeCollection;
    private Collection $productCollection;
    private Collection $branchesCollection;

    public function __construct()
    {
        $this->storeCollection = collect([
            (object)[
                'id' => 1,
                'prod_id' => 1,
                'branch_id' => 1,
                'max_quantity' => 25,
                'min_quantity' => 3,
                'quantity_item' => 5,
                'price' => 25,
            ],
        ]);

        $this->productCollection = collect([
            (object)[
                'prod_id'=>1,
                'prod_name'=>'product1'
            ],
            (object)[
                'prod_id'=>2,
                'prod_name'=>'product2'
            ],
        ]);

        $this->branchesCollection = collect([
            (object)[
                'id' => 1,
                'branch_name' => 'branch1'
            ],
            (object)[
                'id' => 2,
                'branch_name' => 'branch2'
            ],
        ]);
    }

    public function getAllStores(): Collection
    {
        return  $this->storeCollection ;
    }

    public function saveRepo(array $data, int $id = null): void
    {
        $products = $this->productCollection;

        foreach ($products as $product) {
            $newId = $this->storeCollection->max('id') + 1;
            $newProduct = (object)[
                'id' => $newId,
                'prod_id' => $product->prod_id,
                'branch_id' => $data['branch_id'],
                'max_quantity' => 100,
                'min_quantity' => 50,
                'quantity_item' => 75,
                'price' => 0.00,
            ];
            $this->storeCollection->push($newProduct);
        }
    }

    public function getNameProductBranchRepo(): Collection
    {
        return $this->storeCollection->map(function ($store) {

            $product = $this->productCollection
                ->firstWhere('prod_id', $store->prod_id);

            $branch = $this->branchesCollection
                ->firstWhere('id', $store->branch_id);

            return (object)[
                'id' => $store->id,
                'max_quantity' => $store->max_quantity,
                'min_quantity' => $store->min_quantity,
                'quantity_item' => $store->quantity_item,
                'price' => $store->price,
                'branch_name' => $branch?->branch_name,
                'prod_name' => $product?->prod_name,
            ];
        });
    }

    public function getOneRepo(array $data = []): Store
    {
        $item = $this->storeCollection->firstWhere('id', 1);
        return new Store([
            'id' => $item->id,
            'prod_id' => $item->prod_id,
        ]);
    }
}

