<?php

namespace Tests\Unit\Services;

use App\Dtos\CategoryDto;
use App\Repositories\Implementation\CategoryRepo;
use App\Services\Implementation\CategoryService;
use PHPUnit\Framework\TestCase;
use Tests\Unit\Stubs\CategoriesRepoStub;

class CategoriesServicesTest extends TestCase
{
    public function testGetAllDataOfCategories()
    {
        $obj = $this->createCategoryServicesObj();
        $categories = $obj->allCategoryPage();

        $this->assertCount(2, $categories);
    }

    public function testCreateCategory()
    {
        $catDto = new CategoryDto();
        $catDto->setCategoryIdForTest(3);
        $catDto->setCategoryName("cat3");

        $obj = $this->createCategoryServicesObj();
        $obj->categorySave($catDto);

        $categories = $obj->allCategoryPage();
        $this->assertCount(3, $categories);
    }

    public function testUpdateCategory()
    {
        $catDto = new CategoryDto();
        $catDto->setCategoryIdForTest(1);
        $catDto->setCategoryName("categoryAfterUpdate");

        $obj = $this->createCategoryServicesObj();
        $obj->categorySave($catDto , 1);

        $categories = $obj->allCategoryPage();
        $this->assertCount(2, $categories);

        $dataWhere = ['id' => 1];
        $category = $obj->getOneCategory($dataWhere);
        $this->assertEquals("categoryAfterUpdate" , $category->cat_name);
    }

    public function testGetOneCategory()
    {
        $dataWhere = ['id' => 1];
        $obj = $this->createCategoryServicesObj();
        $category = $obj->getOneCategory($dataWhere);
        $this->assertEquals("category1", $category->cat_name);
    }

    public function testDeleteCategory()
    {
        $obj = $this->createCategoryServicesObj();
        $obj->categoryDelete(1);

        $categories = $obj->allCategoryPage();
        $this->assertCount(1, $categories);
    }

    public function testGetProductNameFromTableCategoryOfProductService()
    {
        $obj = $this->createCategoryServicesObj();
        $collection = $obj->getProductNameFromTableCategoryOfProductService(2);
        $this->assertCount(1, $collection);
    }

    public function testGetDetailsProductFromTableStoreService()
    {
        $obj = $this->createCategoryServicesObj();
        $collection = $obj->getDetailsProductFromTableStoreService(1,2);
        $this->assertCount(1, $collection);
    }

    private function createCategoryServicesObj(): CategoryService
    {
        return new CategoryService(new CategoriesRepoStub());
    }
}
