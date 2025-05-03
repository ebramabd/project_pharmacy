<?php

namespace App\Repositories\Implementation;

use App\Models\Order;
use App\Models\Order_details;
use App\Models\Store;
use App\Repositories\IOrderRepo;
use App\Trait\Crud;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class OrderRepo implements IOrderRepo
{
    use Crud ;

    public function getDataToShowRepo(): Collection
    {
        $branch_id = auth()->user()->branch_id ;
        return DB::table('stores') //i want (count product , min , price)
            ->join('products' , 'stores.prod_id' , '=' , 'products.id')//i want product name
            ->where('stores.branch_id' , $branch_id)
            ->get([
                'stores.id' ,
                'stores.prod_id' ,
                'stores.branch_id' ,
                'stores.min_quantity' ,
                'stores.quantity_item' ,
                'stores.price' ,
                'products.prod_name' ,
            ]);
    }

    public function storeRepo(array $data): string
    {
        $branch_id = auth()->user()->branch_id ;
        foreach ($data as $order){
            $product_id =$order['product_id'] ;
            $store = Store::where('prod_id' , $product_id)->where('branch_id' , $branch_id)->first();
            Store::where('prod_id' , $product_id)->where('branch_id' , $branch_id)->decrement('quantity_item', $order['quantity']) ;
            $priceProduct = $store->price ;
            $totalPriceProduct[] = $priceProduct * $order['quantity'];
        }
        $totalPriceOrder = array_sum($totalPriceProduct) ;
        $newOrder =  $this->storeOrder(auth()->user()->id ,$totalPriceOrder , $branch_id) ;

        foreach ($data as $order){
            Order_details::create([
                'order_id' =>$newOrder->id,
                'prod_id'=>$order['product_id'] ,
                'quantity'=>$order['quantity']
            ]);
        }
        return "تمام يا ريس تعبناك معانا " ;
    }

    public function storeOrder(int $admin_id ,string $price ,int $branch_id):Order
    {
        $order = new Order();
        return $order->create([
            'admin_id' =>$admin_id ,
            'branch_id' =>$branch_id ,
            'price' =>$price
        ]) ;
    }
}
