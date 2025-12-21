<?php

namespace Tests\Feature\Admin;

use App\Models\Product;
use Tests\Feature\DatabaseModels;
use Tests\TestCase;

class ProductFeatureTest extends TestCase
{
    use DatabaseModels;

    public function test_admin_can_view_all_products_page()
    {
        $this->actingAs($this->getAdmin());

        $response = $this->get(route('product.show'));
        $response->assertStatus(200);
        $response->assertViewIs('admin.product.show');
        $response->assertViewHas('products');
        $response->assertViewHas('products', function ($products) {
            return $products->count() >= 0;
        });
    }

    public function test_admin_can_view_product_create_page()
    {
        $this->actingAs($this->getAdmin());

        $response = $this->get(route('product.save.view'));

        $response->assertStatus(200);
        $response->assertViewIs('admin.product.create');
        $response->assertViewHas('products');
    }

    public function test_admin_can_view_product_edit_page()
    {
        $this->actingAs($this->getAdmin());

        $product = Product::where('prod_name', 'product1')->first();

        $response = $this->get(route('product.save.view', $product->id));
        $response->assertStatus(200);
        $response->assertViewIs('admin.product.create');
        $response->assertViewHas('products', function ($view) use ($product) {
            return $view->id === $product->id;
        });
    }

    public function test_field_when_product_not_exist()
    {
        $this->actingAs($this->getAdmin());
        $nonExistingId = 99999;
        $response = $this->get(route('product.save.view', $nonExistingId));
        $response->assertStatus(200);

        $response->assertViewIs('admin.product.create');

         $response->assertViewHas('products', function ($view) use ($nonExistingId) {
            return $view->id != $nonExistingId;
        });
    }

    public function test_admin_can_create_product()
    {
        $this->withoutMiddleware();
        $this->actingAs($this->getAdmin());

        $response = $this->post(route('product.save.post'), [
            'prod_name' => 'New prod',
            'cat_id' => 1,
        ]);

        $response->assertRedirect(route('product.show'));
        $this->assertDatabaseHas('products', [
             'prod_name' => 'New prod',
        ]);
    }

    public function test_admin_cannot_create_product_without_category()
    {
        $this->withoutMiddleware();
        $this->actingAs($this->getAdmin());

        $response = $this->post(route('product.save.post'), [
            'prod_name' => 'war',
            'cat_id' => null,
        ]);

        $response->assertStatus(302);
        $response->assertSessionHasErrors(['cat_id']);
        $this->assertDatabaseMissing('products', [
            'prod_name' => 'war',
        ]);
    }

    public function test_admin_can_update_branch()
    {
        $this->withoutMiddleware();
        $this->actingAs($this->getAdmin());

        $product = Product::create([
            'prod_name' => 'prod updated',
            'cat_id' => 2,
        ]);

        $response = $this->post(
            route('product.save.post', $product->id),
            [
                'prod_name' => 'Updated Name',
                'cat_id' => 2,
            ]
        );

        $response->assertRedirect(route('product.show'));
        $this->assertDatabaseHas('products', [
            'id' => $product->id,
        ]);
    }

    public function test_admin_can_delete_branch()
    {
        $this->withoutMiddleware();
        $admin = $this->getAdmin();

        $product = Product::create([
            'prod_name' => 'to delete',
            'cat_id' => 2,
        ]);

        $response = $this->actingAs($admin)
            ->get(route('product.delete', $product->id));

        $response->assertRedirect(route('product.show'));
        $this->assertDatabaseMissing('products', [
            'id' => $product->id,
        ]);
    }
}
