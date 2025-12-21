<?php

namespace Tests\Feature\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\Feature\DatabaseModels;
use Tests\TestCase;

class StoreFeatureTest extends TestCase
{
    use DatabaseModels;

    public function test_admin_can_show_store_page()
    {
        $this->actingAs($this->getAdmin());

        $response = $this->get(route('store.show'));
        $response->assertStatus(200);
        $response->assertViewIs('admin.store.show');
        $response->assertViewHas('stores');
        $response->assertViewHas('stores', function ($stores) {
            return $stores->count() >= 0;
        });
    }

    public function test_admin_can_get_view_store_to_save()
    {
        $this->actingAs($this->getAdmin());

        $response = $this->get(route('store.save.view'));
        $response->assertStatus(200);
        $response->assertViewIs('admin.store.create');

        $response->assertViewHas('branches');

        $response->assertViewHas('branches', function ($branches) {
            return $branches->count() >= 0;
        });
    }

    public function test_admin_can_save_new_store()
    {
        $this->withoutMiddleware();
        $admin = $this->getAdmin();

        $this->actingAs($admin);

        $response = $this->post(route('store.save.post'), [
            'branch_id' => 2,
        ]);

        $response->assertRedirect(route('store.show'));
        $response->assertSessionHas('success', 'this user add successful');

        $this->assertDatabaseHas('stores', [
            'branch_id' => 2,
        ]);
    }

}
