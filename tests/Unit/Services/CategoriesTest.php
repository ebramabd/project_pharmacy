<?php

namespace Tests\Unit\Services;

use App\Repositories\Implementation\CategoryRepo;
use App\Services\Implementation\CategoryService;
use PHPUnit\Framework\TestCase;
use Tests\Unit\Stubs\CategoriesStub;

class CategoriesTest extends TestCase
{
    public function testGetAllDataOfCategories()
    {
        $obj = $this->createCategoryServicesObj();
        $categories = $obj->allCategoryPage();

        $this->assertCount(2, $categories);
    }

    private function createCategoryServicesObj(): CategoryService
    {
        return new CategoryService(new CategoriesStub());

    }
}
