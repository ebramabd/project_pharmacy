<?php

namespace Tests\Feature\Api;

use App\Models\Admin;
use App\Models\User;
use App\Models\Store;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\Feature\DatabaseModels;
use Tests\TestCase;

class ApiOrderFeatureTest extends TestCase
{
    use RefreshDatabase;
    use DatabaseModels;

    public function test_authenticated_user_can_store_order()
    {
        $user = Admin::factory()->create([
            'type' => 'admin_panel',
        ]);

        Store::create([
            'prod_id' => 13,
            'branch_id' => $user->branch_id,
            'quantity_item' => 10,
            'max_quantity' => 10,
            'min_quantity' => 10,
            'price' => 100,
        ]);

        $token = $user->createToken('api')->plainTextToken;

        $payload = [
            'options' => [13],
            'quantity' => [2],
            'branch_id' => $user->branch_id,
        ];

        $response = $this->withHeaders([
            'Authorization' => 'Bearer ' . $token,
            'Accept' => 'application/json',
        ])->postJson('/api/orders', $payload);

        $response->assertStatus(201);

    }
}
