<?php

namespace Tests\Feature\AdminBranches;

use Tests\Feature\DatabaseModels;
use Tests\TestCase;

class OrderFeatureTest extends TestCase
{
   use DatabaseModels;

    public function test_admin_can_view_make_order_page()
    {
        $this->actingAs($this->getAdmin());

        $response = $this->get(route('make-order'));

        $response->assertStatus(200);
        $response->assertViewIs('adminBranches.order.make_order');
        $response->assertViewHas('data');
    }

    public function test_admin_can_store_order()
    {
        $this->withoutMiddleware();
        $this->actingAs($this->getAdmin());

        \App\Models\Store::create([
            'prod_id' => 13,
            'branch_id' => $this->getAdmin()->branch_id,
            'quantity_item' => 10,
            'max_quantity' => 10,
            'min_quantity' => 10,
            'price' => 100,
        ]);

        $payload = [
            'options' => [13, 13, 13],
            'quantity' => [2, 2, 2],
            'branch_id' => $this->getAdmin()->branch_id, // important for your DTO
        ];
        $response = $this->post(route('store-order'), $payload);
        $response->assertStatus(200);
    }

}
