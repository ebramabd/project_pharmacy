<?php

namespace App\Repositories\Implementation;

use App\Models\Requests_of_product;
use App\Repositories\ICreateRequestRepo;
use App\Trait\Crud;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class CreateRequestRepo implements ICreateRequestRepo
{
    use Crud ;

    public function getProductFromBranchRepo():Collection
    {
        $branch_id = auth()->user()->branch_id ;
        return DB::table('stores')
            ->join('products' , 'stores.prod_id' ,'=', 'products.id')
            ->where('stores.branch_id', $branch_id)
            ->get();
    }

    public function addRequestRepo(array $data): void
    {
        $this->save(new Requests_of_product() , $data) ;
    }

    public function updateStoreRepo(array $data):void
    {
        $branch_id = auth()->user()->branch_id ;
        DB::table('stores')
            ->where('branch_id' , $branch_id)
            ->where('prod_id' , $data['prod_id'])
            ->update([
                'max_quantity' => $data['max_quantity']  ,
                'min_quantity' =>$data['min_quantity'] ,
                'price' => $data['price'] ,
            ]);
    }


}
