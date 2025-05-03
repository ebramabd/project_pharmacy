<?php

namespace App\Services\Implementation;

use App\Dtos\ProductDto;
use App\Models\Category;
use App\Models\Product;
use App\Repositories\ICategoryRepo;
use App\Repositories\Implementation\CategoryRepo;
use App\Repositories\Implementation\ProductRepo;
use App\Repositories\IProductRepo;
use App\Services\IProductService;
use Illuminate\Database\Eloquent\Collection;

class ProductService implements IProductService
{
    public function __construct(
        private IProductRepo $productRepo,
        private ICategoryRepo $categoryRepo
    )
    {
    }

    public function ShowAllServ(): Collection
    {
        return $this->productRepo->getAllRepo();
    }

    /**
     * @return array{
     *  'products' : array<Product>,
     *  'categories' : array<Category>
     * }
     */
    public function getShowAllData(): array
    {
        return [
            'products' => $this->productRepo->getAllRepo(),
            'categories' => $this->categoryRepo->getAllRepo(),
        ];
    }

    public function saveServ(ProductDto $dto ,int $id = null):Product
    {
        $data = [];
        $data['prod_name'] = $dto->getProdName() ;
        $data['cat_id'] = $dto->getCatId() ;
        if ($id == null ){
            $dataWhere = ['prod_name' => $dto->getProdName()] ;
            $product = $this->getOneSer($dataWhere) ;
            return  $this->productRepo->saveRepo($data ) ;
        }
        return $this->productRepo->saveRepo($data , $id) ;

    }



    public function deleteServ(int $id): void
    {
        $this->productRepo->deleteRepo($id);
    }

    public function getOneSer(array $data=[]):Product
    {
        return $this->productRepo->getOneRepo($data) ;
    }

}
