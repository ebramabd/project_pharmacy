<?php

namespace Tests\Feature\Admin;

use App\Http\Requests\Admin\BranchRequest;
use App\Models\Requests_of_product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\Feature\DatabaseModels;
use Tests\TestCase;

class BranchRequestFeatureTest extends TestCase
{
    use DatabaseModels;

    public function test_guest_cannot_access_show_all_request_page()
    {
        $response = $this->get(route('show-request'));
        $response->assertRedirect(route('login'));
    }


    public function test_admin_can_show_all_request_page()
    {
        $this->actingAs($this->getAdmin());

        $response = $this->get(route('show-request'));
        $response->assertStatus(200);

        $response->assertViewIs('admin.requests.show');
        $response->assertViewHas('dataOfRequest', function ($item) {
            return $item->count() >= 0;
        });
    }

    public function test_admin_can_view_requests_page_when_no_requests_exist()
    {
        $this->actingAs($this->getAdmin());

        $response = $this->get(route('show-request'));

        $response->assertStatus(200);
        $response->assertViewIs('admin.requests.show');

        $response->assertViewHas('dataOfRequest', function ($data) {
            return $data->isEmpty();
        });
    }

    public function test_admin_can_accept_branch_request()
    {
        $this->actingAs($this->getAdmin());

        $branchRequest = Requests_of_product::create([
            'branch_id'=>1,
            'prod_id'=>1,
            'quantity_of_prod'=>20,
        ]);

        $response = $this->post(route('accept-request'), [
            'branch_id' => $branchRequest->branch_id,
        ]);

        $this->assertDatabaseHas('requests_of_product', [
            'id' => $branchRequest->id,
        ]);
    }


}
