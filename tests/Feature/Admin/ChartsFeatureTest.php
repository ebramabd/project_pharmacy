<?php

namespace Tests\Feature\Admin;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\Feature\DatabaseModels;
use Tests\TestCase;

class ChartsFeatureTest extends TestCase
{
    use DatabaseModels;

    public function test_admin_can_view_branch_chart_page()
    {
        $this->actingAs($this->getAdmin());

        $response = $this->get(route('show-charts-branch'));

        $response->assertStatus(200);
        $response->assertViewIs('admin.charts.searchBranch');
        $response->assertViewHas([
            'branchNames',
            'prices'
        ]);
    }

    public function test_branch_chart_page_loads_with_empty_data()
    {
        $this->actingAs($this->getAdmin());
        $response = $this->get(route('show-charts-branch'));

        $response->assertStatus(200);
        $response->assertViewIs('admin.charts.searchBranch');

        $response->assertViewHas('data', function ($data) {
            return empty($data) || count($data) === 0;
        });
    }

    public function test_admin_can_view_product_chart_page()
    {
        $this->actingAs($this->getAdmin());

        $response = $this->get(route('show-charts-product'));

        $response->assertStatus(200);
        $response->assertViewIs('admin.charts.search');
        $response->assertViewHas([
            'productNames',
            'productQuantities',
        ]);
    }

    public function test_product_chart_page_loads_with_empty_data()
    {
        $this->actingAs($this->getAdmin());

        $response = $this->get(route('show-charts-product'));

        $response->assertStatus(200);
        $response->assertViewIs('admin.charts.search');

        $response->assertViewHas('data', function ($data) {
            return empty($data) || count($data) === 0;
        });
    }

}
