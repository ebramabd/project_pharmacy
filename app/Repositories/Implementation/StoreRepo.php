<?php

namespace App\Repositories\Implementation;

use App\Models\Admin;
use App\Models\Product;
use App\Models\Store;
use App\Repositories\IStoreRepo;
use App\Trait\Crud;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

class StoreRepo implements IStoreRepo
{
    use Crud ;

//    public function getAllRepo(): Collection
//    {
//        return $this->getAllObject(new Admin());
//    }

    public function getOneRepo(array $data = []):Store
    {
        $store = $this->getOneObject(new Store() , $data) ;
        if ($store == false){
            return new Store();
        }return $store ;
    }

    public function saveRepo( $data , $id = null ):void
    {

        $products = $this->getAllObject(new Product());
        foreach ($products as $product){
             $store = new Store() ;
             $store->create([
                 'prod_id'=>$product->id,
                 'branch_id'=>$data['branch_id'],
                 'max_quantity'=>100,
                 'min_quantity'=>50,
                 'quantity_item'=>75,
                 'price'=>0.00,
             ]);
        }
    }



    public function getNameProductBranchRepo(): Collection
    {
          return DB::table('stores')
              ->join('branches' , 'stores.branch_id' , '=' , 'branches.id')
              ->join('products' , 'stores.prod_id' ,'=' , 'products.id')
              ->get([
                  'stores.id' ,
                  'stores.max_quantity' ,
                  'stores.min_quantity' ,
                  'stores.quantity_item',
                  'stores.price' ,
                  'branches.branch_name' ,
                  'products.prod_name' ,
              ]);
    }
}
