<?php

namespace App\Services\Implementation;

use App\Dtos\CategoryDto;
use App\Models\Category;
use App\Repositories\ICategoryRepo;
use App\Repositories\Implementation\CategoryRepo;
use App\Services\ICategoryService;
use Illuminate\Support\Collection;

//use Illuminate\Database\Eloquent\Collection;

class CategoryService implements ICategoryService
{
    public function __construct(private ICategoryRepo $categoryRepo)
    {
    }

    public function allCategoryPage(): Collection
    {
        return $this->categoryRepo->getAllRepo();
    }

    public function categorySave(CategoryDto $dto, int $id = null): Category
    {
        $data             = [];
        $data['cat_name'] = $dto->getCategoryName() ;
        if ($id == null) {
//            $dataWhere   = ['cat_name' => $dto->getCategoryName() ];
//            $getCategory = $this->categoryRepo->getOneRepo($dataWhere);
//            if (!empty($getCategory)) {
//                return new Category();
//            }
            return $this->categoryRepo->saveRepo($data) ;
        }
        return $this->categoryRepo->saveRepo($data, $id) ;
    }

    public function getOneCategory(array $data = []): Category
    {
        return $this->categoryRepo->getOneRepo($data);
    }

    public function categoryDelete(int $id): void
    {
        $this->categoryRepo->deleteRepo($id);
    }

    public function getProductNameFromTableCategoryOfProductService(int $cat_id): Collection
    {
        return $this->categoryRepo->getProductNameFromTableCategoryOfProductRepo($cat_id);
    }

    public function getDetailsProductFromTableStoreService(int $branch_id, int $prod_id): collection
    {
        return $this->categoryRepo->getDetailsProductFromTableStoreRepo($branch_id, $prod_id) ;
    }
}
