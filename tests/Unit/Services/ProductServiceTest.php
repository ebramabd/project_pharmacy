<?php

namespace Tests\Unit\Services;

use App\Dtos\ProductDto;
use App\Services\Implementation\ProductService;
use PHPUnit\Framework\TestCase;
use Tests\Unit\Stubs\CategoriesRepoStub;
use Tests\Unit\Stubs\ProductRepoStub;

class ProductServiceTest extends TestCase
{

    public function testGetAllDataOfCategories()
    {
        $obj = $this->createProductServiceObj();
        $products = $obj->ShowAllServ();

        $this->assertCount(2, $products);
    }

    public function testCreateProduct()
    {
        $prodDto = new ProductDto();
        $prodDto->setProductId(3);
        $prodDto->setCatId(1);
        $prodDto->setProdName('product3');

        $obj = $this->createProductServiceObj();
        $obj->saveServ($prodDto);

        $products = $obj->ShowAllServ();
        $this->assertCount(3, $products);
    }

    public function testUpdateProduct()
    {
        $prodDto = new ProductDto();
        $prodDto->setProductId(1);
        $prodDto->setCatId(1);
        $prodDto->setProdName('productUpdate');

        $obj = $this->createProductServiceObj();
        $obj->saveServ($prodDto, 1);

        $products = $obj->ShowAllServ();
        $this->assertCount(2, $products);

        $productNames = [];
        foreach ($products as $product) {
            $productNames[] = $product->prod_name;
        }
        $this->assertContains($prodDto->getProdName(), $productNames);
    }

    public function testDeleteCategory()
    {
        $obj = $this->createProductServiceObj();
        $obj->deleteServ(1);

        $products = $obj->ShowAllServ();
        $this->assertCount(1, $products);
    }

    private function createProductServiceObj(): ProductService
    {
        return new ProductService(new ProductRepoStub(), new CategoriesRepoStub());
    }
}
