<?php

namespace App\Repositories\Implementation;

use App\Models\Category_of_product;
use App\Models\Product;
use App\Repositories\IBranchRepo;
use App\Repositories\IProductRepo;
use App\Trait\Crud;
use Illuminate\Database\Eloquent\Collection;

class ProductRepo implements IProductRepo
{
    use Crud ;

    public function getAllRepo():Collection
    {
        return $this->getAllObject(new Product());
    }

    public function saveRepo(array $data ,int $id = null ): Product
    {

        if ($id == null ) { //i will create
            $product = $this->save(new Product(), $data);
            $categoryOfProduct = [];
            $categoryOfProduct['prod_id'] = $product->id;
            $categoryOfProduct['cat_id'] = $data['cat_id'];
            $this->save(new Category_of_product(), $categoryOfProduct);
            return $product;
        }
        $categoryOfProduct = [];
        $categoryOfProduct['prod_id'] = $id ;
        $categoryOfProduct['cat_id'] = $data['cat_id'] ;
        $this->save(new Category_of_product() , $categoryOfProduct);
        $product = $this->save(new Product() , $data, $id);
        return $product ;
    }
    public function deleteRepo(int $id): void
    {
        $this->deleteCategoryOfProduct($id);
        $this->delete(new Product() , $id) ;
    }

    public function deleteCategoryOfProduct(int $prod_id): void
    {
        $categoryOfProduct = Category_of_product::where('prod_id' , $prod_id)->get();
        foreach ($categoryOfProduct as $product){
            $product->delete();
        }
    }
    public function getOneRepo(array $data = []):Product
    {
        $product = $this->getOneObject(new Product() , $data) ;
        if ($product == false){
            return new Product();
        }return $product ;
    }




}
