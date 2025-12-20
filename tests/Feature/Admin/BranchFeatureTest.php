<?php

namespace Tests\Feature\Admin;

use App\Models\Branch;
use Tests\Feature\Models;
use Tests\TestCase;

class BranchFeatureTest extends TestCase
{
    use Models;

    public function test_admin_can_view_all_branches_page()
    {
        $this->actingAs($this->getAdmin());

        $response = $this->get(route('branch.show'));
        $response->assertStatus(200);
        $response->assertViewIs('admin.branch.show');
        $response->assertViewHas('branches');
        $response->assertViewHas('branches', function ($branches) {
            return $branches->count() > 0;
        });
    }

    public function test_admin_can_view_branch_create_page()
    {
        $this->actingAs($this->getAdmin());

        $response = $this->get(route('branch.save.view'));

        $response->assertStatus(200);
        $response->assertViewIs('admin.branch.create');
        $response->assertViewHas('branches');
    }

    public function test_admin_can_view_branch_edit_page()
    {
        $this->actingAs($this->getAdmin());

        $branch = Branch::where('branch_name', 'branch1')->first();

        $response = $this->get(route('branch.save.view', $branch->id));
        $response->assertStatus(200);
        $response->assertViewIs('admin.branch.create');
        $response->assertViewHas('branches', function ($viewBranch) use ($branch) {
            return $viewBranch->id === $branch->id;
        });
    }

    public function test_admin_can_create_branch()
    {
        $this->withoutMiddleware();
        $admin = $this->getAdmin();

        $this->actingAs($admin, 'web');

        $response = $this->post(route('branch.save.post'), [
            'branch_name' => 'New Branch',
        ]);

        $response->assertRedirect(route('branch.show'));
        $response->assertSessionHas('success', 'this branch added successful');

        $this->assertDatabaseHas('branches', [
            'branch_name' => 'New Branch',
        ]);
    }

    public function test_admin_can_update_branch()
    {
        $this->withoutMiddleware();
        $this->actingAs($this->getAdmin());

        $branch = Branch::factory()->create([
            'branch_name' => 'Old Name',
        ]);

        $response = $this->post(
            route('branch.save.post', $branch->id),
            ['branch_name' => 'Updated Name']
        );

        $response->assertRedirect(route('branch.show'));
        $response->assertSessionHas('success', 'this branch update successful');
        $this->assertDatabaseHas('branches', [
            'id' => $branch->id,
            'branch_name' => 'Updated Name',
        ]);
    }

    public function admin_can_delete_branch()
    {
        $this->withoutMiddleware();
        $admin = $this->getAdmin();

        $branch = Branch::factory()->create([
            'branch_name' => 'Branch To Delete',
        ]);

        $response = $this->actingAs($admin)
            ->delete(route('branch.delete', $branch->id));

        $response->assertRedirect(route('branch.show'));
        $response->assertSessionHas('success', 'this category deleted successful');
        $this->assertDatabaseMissing('branches', [
            'id' => $branch->id,
            'branch_name' => 'Branch To Delete',
        ]);
    }

}
