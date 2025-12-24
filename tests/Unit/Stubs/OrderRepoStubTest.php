<?php

namespace Tests\Unit\Stubs;

use App\Models\Order;
use App\Repositories\IOrderRepo;
use Illuminate\Support\Collection;
use Tests\Unit\Collections;

class OrderRepoStubTest implements IOrderRepo
{
    use Collections;

    public function getDataToShowRepo(): Collection
    {
        $branch_id = 1;
        return $this->storeCollection()
            ->where('branch_id', $branch_id)
            ->map(function ($store) {
                $product = $this->productCollection()->where('prod_id', "=", $store->prod_id)->first();
                return (object)[
                    'id' => $store->id,
                    'prod_id' => $product->prod_id,
                    'branch_id' => $store->branch_id,
                    'min_quantity' => $store->min_quantity,
                    'quantity_item' => $store->quantity_item,
                    'price' => $store->price,
                    'prod_name' => $product->prod_name,
                ];
            });
    }

    public function storeRepo(array $data, int $branchId = null): string
    {
        $branch_id = 1;
        foreach ($data as $order) {
            $product_id = $order['product_id'];

            $store = $this->storeCollection()
                ->where('prod_id', $product_id)
                ->where('branch_id', $branch_id)
                ->first();

            $priceProduct = $store->price;
            $totalPriceProduct[] = $priceProduct * $order['quantity'];
        }
        $totalPriceOrder = array_sum($totalPriceProduct);
        $newOrder = $this->storeOrder(1, $totalPriceOrder, $branch_id);

        foreach ($data as $order) {
            $newItem = (object)[
                'order_id' => $newOrder->id,
                'prod_id' => $order['product_id'],
                'quantity' => $order['quantity'],
            ];

            $this->orderDetailsCollection()->push($newItem);
        }
        return 'تمام يا ريس تعبناك معانا ';
    }

    public function storeOrder(int $admin_id = null, string $price, int $branch_id, int $client_id = null): Order
    {
        $order = $this->orderCollectionTrait();
        $order->push([
            'admin_id'  => $admin_id ,
            'branch_id' => $branch_id ,
            'price'     => $price,
            'client_id'     => $client_id,
        ]) ;

        return new Order([
            'admin_id'  => $admin_id ,
            'branch_id' => $branch_id ,
            'price'     => $price,
            'client_id'     => $client_id,
        ]);
    }
}
