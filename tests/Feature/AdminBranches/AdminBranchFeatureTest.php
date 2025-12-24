<?php

namespace Tests\Feature\AdminBranches;

use App\Models\Admin;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AdminBranchFeatureTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_branch_user_sees_admin_view()
    {
        $user = Admin::factory()->create([
            'type' => 'admin_branch',
        ]);

        $this->actingAs($user);

        $response = $this->get(route('afterLogin'));

        $response->assertStatus(200);
        $response->assertViewIs('layouts.admin');
    }

    public function test_admin_panel_user_sees_admin_view()
    {
        $user = Admin::factory()->create([
            'type' => 'admin_panel',
        ]);

        $this->actingAs($user);

        $response = $this->get(route('afterLogin'));

        $response->assertStatus(200);
        $response->assertViewIs('layouts.admin');
    }

    public function test_other_user_sees_username()
    {
        $user = Admin::factory()->create([
            'type' => 'user',

        ]);

        $this->actingAs($user);

        $response = $this->get(route('afterLogin'));

        $response->assertStatus(200);

    }
}
