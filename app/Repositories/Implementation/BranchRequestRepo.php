<?php

namespace App\Repositories\Implementation;

use App\Models\Requests_of_product;
use App\Models\Store;
use App\Repositories\IBranchRequestRepo;
use App\Trait\Crud;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class BranchRequestRepo implements IBranchRequestRepo
{
    use Crud ;

    public function getDataForAccept(): Collection
    {
        return DB::table('requests_of_product')
            ->join('products' , 'requests_of_product.prod_id' ,'=' , 'products.id')
            ->join('branches' , 'requests_of_product.branch_id' ,'=' , 'branches.id')
            ->where('requests_of_product.accept_or_not' , 'not')
            ->get([
                'requests_of_product.id' ,
                'requests_of_product.branch_id',
                'requests_of_product.prod_id',
                'requests_of_product.quantity_of_prod',
                'products.prod_name',
                'branches.branch_name',
            ]);
    }

    public function acceptRequestBranch($dto): void
    {
        $tableRequests = new Requests_of_product() ;
        $tableRequests->where('id' , $dto->getRequestId())->update(['accept_or_not'=>'accepted']);
        $this->changeQuantityOfProduct($dto->getProdId() , $dto->getBranchId() , $dto->getQuantityOfProduct());
    }

    public function changeQuantityOfProduct(int $prod_id ,int $branch_id ,int $quantity_of_prod): void
    {
        $data = [
            'prod_id'=>$prod_id ,
            'branch_id'=>$branch_id
        ];
        $tableStore = new Store();
        $tableStore->where($data)->increment('quantity_item', $quantity_of_prod) ;
    }
}
