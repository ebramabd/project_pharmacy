<?php

namespace Tests\Feature\Admin;

use App\Models\User;
use Illuminate\Support\Str;
use Tests\Feature\DatabaseModels;
use Tests\TestCase;

class UserFeatureTest extends TestCase
{
    use DatabaseModels;

    public function test_admin_can_view_users_with_branch_names()
    {
        $this->actingAs($this->getAdmin());
        $response = $this->get(route('user.show'));
        $response->assertStatus(200);
        $response->assertViewIs('admin.user.show');
        $response->assertViewHas('users');
    }

    public function test_admin_can_view_user_save_page_without_id()
    {
        $this->actingAs($this->getAdmin());


        $response = $this->get(route('user.save.view'));

        $response->assertStatus(200);
        $response->assertViewIs('admin.user.create');
        $response->assertViewHas('branches');
         $response->assertViewHas('users', function ($user) {
            return $user->count() >= 0;
        });
    }


    public function test_admin_can_view_user_save_page_with_id()
    {
        $this->actingAs($this->getAdmin());
        $user = User::where('id', 2)->first();
        $response = $this->get(route('user.save.view', $user->id));

        $response->assertStatus(200);
        $response->assertViewIs('admin.user.create');
        $response->assertViewHas('branches');
        $response->assertViewHas('users');

        $this->assertDatabaseHas('users', [
            'id' =>  $user->id,
        ]);
    }


    public function test_admin_can_create_user()
    {
        $this->withoutMiddleware();
        $this->actingAs($this->getAdmin());

        $username = 'user_' . Str::random(8);

        $response = $this->post(route('user.save.post'), [
            'user_name' => $username,
            'password' => 'password',
            'branch_id' => 1,
            'type' => 'admin',
        ]);

        $response->assertRedirect(route('user.show'));
        $response->assertSessionHas('success', 'this user added successful');

        $this->assertDatabaseHas('users', [
            'user_name' => $username,
        ]);
    }



}
