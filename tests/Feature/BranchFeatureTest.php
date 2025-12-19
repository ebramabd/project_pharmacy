<?php

namespace Tests\Feature;

use App\Models\Admin;
use App\Models\Branch;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BranchFeatureTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_view_all_branches_page()
    {
        $admin = Admin::factory()->create();
        $this->actingAs($admin);
//        $this->withoutMiddleware();
        Branch::factory()->count(2)->create();

        $response = $this->get(route('branch.show'));
        $response->assertStatus(200);
        $response->assertViewIs('admin.branch.show');
        $response->assertViewHas('branches');
    }

}
