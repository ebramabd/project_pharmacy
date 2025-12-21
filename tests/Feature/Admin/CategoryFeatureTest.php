<?php

namespace Tests\Feature\Admin;

use App\Models\Category;
use Tests\Feature\DatabaseModels;
use Tests\TestCase;

class CategoryFeatureTest extends TestCase
{
    use DatabaseModels;

    public function test_admin_can_view_categories_page()
    {
        $this->actingAs($this->getAdmin());

        $response = $this->get(route('category.show'));
        $response->assertStatus(200);
        $response->assertViewIs('admin.category.show');
        $response->assertViewHas('categories');
        $response->assertViewHas('categories', function ($branches) {
            return $branches->count() > 0;
        });
    }

    public function test_admin_can_create_category()
    {
        $this->withoutMiddleware();
        $admin = $this->getAdmin();

        $this->actingAs($admin);

        $response = $this->post(route('category.create.post'), [
            'cat_name' => 'New Category',
        ]);

        $response->assertRedirect(route('category.show'));
        $response->assertSessionHas('success', 'this category add successful');

        $this->assertDatabaseHas('categories', [
            'cat_name' => 'New Category',
        ]);
    }

    public function test_admin_can_update_category()
    {
        $this->withoutMiddleware();
        $this->actingAs($this->getAdmin());

        $category = Category::create([
            'cat_name' => 'Old Name',
        ]);

        $response = $this->post(
            route('category.create.post', $category->id),
            ['cat_name' => 'Updated Name']
        );

        $response->assertRedirect(route('category.show'));
        $response->assertSessionHas('success', 'this category updated successful');
        $this->assertDatabaseHas('categories', [
            'id' => $category->id,
            'cat_name' => 'Updated Name',
        ]);
    }

    public function test_admin_can_delete_category()
    {
        $this->withoutMiddleware();
        $admin = $this->getAdmin();

        $category = Category::create([
            'cat_name' => 'Category To Delete',
        ]);

        $response = $this->actingAs($admin)
            ->get(route('category.delete', $category->id));

        $response->assertRedirect(route('category.show'));
        $response->assertSessionHas('success', 'this category deleted successful');
        $this->assertDatabaseMissing('categories', [
            'id' => $category->id,
            'cat_name' => 'Category To Delete',
        ]);
    }

    public function test_admin_can_view_category_create_page()
    {
        $this->actingAs($this->getAdmin());

        $response = $this->get(route('category.create.view'));

        $response->assertStatus(200);
        $response->assertViewIs('admin.category.create');
        $response->assertViewHas('categories');
    }

    public function test_admin_can_view_branch_edit_page()
    {
        $this->actingAs($this->getAdmin());

        $category = Category::where('cat_name', 'New Category')->first();

        $response = $this->get(route('category.create.view', $category->id));
        $response->assertStatus(200);
        $response->assertViewIs('admin.category.create');
        $response->assertViewHas('categories', function ($view) use ($category) {
            return $view->id === $category->id;
        });
    }
}
