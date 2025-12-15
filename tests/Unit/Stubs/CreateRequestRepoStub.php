<?php

namespace Tests\Unit\Stubs;

use App\Repositories\ICreateRequestRepo;
use Illuminate\Support\Collection;
use Tests\Unit\Collections;

class CreateRequestRepoStub implements ICreateRequestRepo
{
    use Collections;

    public function addRequestRepo(array $data): void
    {
        $this->requestOfProductCollection()->push($data);
    }

    public function updateStoreRepo(array $data): void
    {
        $branch_id = 1;

        $this->storeCollection()
            ->where('branch_id', $branch_id)
            ->where('prod_id', $data['prodId'])
            ->each(function ($item) use ($data) {
                $item->max_quantity = $data['max_quantity'];
                $item->min_quantity = $data['min_quantity'];
                $item->price = $data['price'];
            });
    }


    public function getProductFromBranchRepo(): Collection
    {
        $branch_id = 1;
        return $this->storeCollection()
            ->where('branch_id', $branch_id)
            ->map(function ($item) {
                $product = $this->productCollection()->where('prod_id', $item->prod_id)->first();

                return (object)[
                    'prod_id' => $product->prod_id,
                    'branch_id' => $item->branch_id,
                    'max_quantity' => $item->max_quantity,
                    'min_quantity' => $item->min_quantity,
                    'quantity_item' => $item->quantity_item,
                    'price' => $item->price,
                ];
            });
    }
}
