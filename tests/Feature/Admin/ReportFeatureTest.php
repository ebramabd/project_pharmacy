<?php

namespace Tests\Feature\Admin;

use App\Services\Implementation\ReportsService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Mockery;
use Tests\Feature\DatabaseModels;
use Tests\TestCase;

class ReportFeatureTest extends TestCase
{
    use DatabaseModels;

    public function test_guest_cannot_access_reports_page()
    {
        $response = $this->get(route('show-reports'));
        $response->assertRedirect(route('login'));
    }

    public function test_admin_can_view_reports_page()
    {
        $this->actingAs($this->getAdmin());

        $response = $this->get(route('show-reports'));

        $response->assertStatus(200);
        $response->assertViewIs('admin.reports.searchBranches');
        $response->assertViewHas('branches');
    }

    public function test_reports_page_loads_when_no_branches_exist()
    {
        $this->actingAs($this->getAdmin());

        $mock = Mockery::mock(ReportsService::class);
        $mock->shouldReceive('getAllBranchService')
            ->once()
            ->andReturn(collect());

        $this->app->instance(ReportsService::class, $mock);

        $response = $this->get(route('show-reports'));

        $response->assertStatus(200);
        $response->assertViewIs('admin.reports.searchBranches');

        $response->assertViewHas('branches', function ($branches) {
            return $branches instanceof \Illuminate\Support\Collection
                && $branches->isEmpty();
        });
    }

    public function test_admin_can_search_branch_orders()
    {
        $this->withoutMiddleware();

        $this->actingAs($this->getAdmin());

        $response = $this->post(route('search-reports'), [
            'branch_id' => 1,
            'period' => 2,
        ]);

        $response->assertStatus(200);
        $response->assertViewIs('admin.reports.branchesOrdersReports');
        $response->assertViewHas('orders');
    }

    public function test_search_branch_orders_fails_when_required_fields_missing()
    {
        $this->withoutMiddleware();
        $this->actingAs($this->getAdmin());

        $response = $this->post(route('search-reports'), []);
        $response->assertStatus(302);
        $response->assertSessionHasErrors([
            'branch_id',
            'period',
        ]);
    }

    public function test_admin_can_view_order_details()
    {
        $this->actingAs($this->getAdmin());

        $response = $this->get(route('showOrderDetails', 1));

        $response->assertStatus(200);
        $response->assertViewIs('admin.reports.showOrderDetails');
        $response->assertViewHas('orderDetails');
    }

    public function test_admin_can_view_search_product_number_page()
    {
        $this->actingAs($this->getAdmin());
        $response = $this->get(route('search-product'));

        $response->assertStatus(200);
        $response->assertViewIs('admin.reports.product.searchProductNum');
        $response->assertViewHas('branches');
        $response->assertViewHas('products');
    }

    public function test_admin_can_get_product_num()
    {
        $this->withoutMiddleware();
        $this->actingAs($this->getAdmin());
        $response = $this->post(route('get-product'), [
            'branch' => 1,
            'product' => 2,
            'period' => 2,
        ]);
        $response->assertRedirect(route('search-product'));
        $response->assertSessionHas('success');
    }

    public function test_admin_cannot_get_product_num_without_required_fields()
    {
        $this->withoutMiddleware();
        $this->actingAs($this->getAdmin());

        $response = $this->post(route('get-product'), []);
        $response->assertStatus(302);
        $response->assertSessionHasErrors(['branch', 'product', 'period']);

        $this->assertFalse(session()->has('success'));
    }

    public function test_admin_can_show_order_branch_num()
    {
        $this->withoutMiddleware();
        $this->actingAs($this->getAdmin());

        $response = $this->get(route('show-order-branch'));
        $response->assertStatus(200);
        $response->assertViewIs('admin.reports.showAllBranchOrders');
        $response->assertViewHas('branchOrders');
    }

}
