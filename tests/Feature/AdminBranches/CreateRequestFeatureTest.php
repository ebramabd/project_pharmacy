<?php

namespace Tests\Feature\AdminBranches;

use Tests\Feature\DatabaseModels;
use Tests\TestCase;

class CreateRequestFeatureTest extends TestCase
{
    use DatabaseModels;
    public function test_admin_can_get_categories()
    {
        $this->actingAs($this->getAdmin());
        $response = $this->get(route('getCategories'));
        $response->assertStatus(200);
        $response->assertViewIs('adminBranches.showAllCategories');
        $response->assertViewHas('categories');
        $response->assertViewHas('categories', function ($categories) {
            return $categories->count() > 0;
        });
    }

    public function test_admin_can_get_products_by_category()
    {
        $this->actingAs($this->getAdmin());
        $category = $this->createCategoryWithProducts();

        $response = $this->get(route('getProducts', $category->id));

        $response->assertStatus(200);
        $response->assertViewIs('adminBranches.showProducts');
        $response->assertViewHas('products');
    }

    public function test_admin_can_get_products_with_branch()
    {
        $this->actingAs($this->getAdmin());

        $this->createProductInBranch(1);

        $response = $this->get(route('getProductsWithBranch'));

        $response->assertStatus(200);
        $response->assertViewIs('adminBranches.showOneProductDetails');
        $response->assertViewHas('productsDetails');
    }


    public function test_admin_can_add_request()
    {
        $this->withoutMiddleware();
        $this->actingAs($this->getAdmin());

        $payload = $this->validAddRequestData();

        $response = $this->post(route('addRequest'), $payload);

        $response->assertStatus(302);
    }

    public function test_admin_can_update_store()
    {
        $this->withoutMiddleware();
        $this->actingAs($this->getAdmin());

        $payload = $this->validUpdateStoreData();

        $response = $this->post(route('update-store'), $payload);

        $response->assertStatus(302);
    }

}
